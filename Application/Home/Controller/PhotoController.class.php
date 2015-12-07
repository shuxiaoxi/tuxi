<?php

namespace Home\Controller;

use Think\Controller;

class PhotoController extends CommonController {



    //模板列表

    public function index(){
        //获取筛选
        $this->screen = F('screen');
        
        //判断用户是否赛选
        //分类=genre
        //版式=format
        //排序=rank
        //尺寸=size

        if($_GET['genre']){

            $demand['genre']=$_GET['genre'];
            if($_GET['genre']>=1){
                $where['photo_sort'] = $_GET['genre'];
            }

        }
        if($_GET['format']){
            $demand['format']=$_GET['format'];
            if($_GET['format']!='全部' && $_GET['format']!=''){
                $format = array('like','%'.$demand['format'].'%');
            }

        }

        //排序
        //new=最新
        if($_GET['rank']=='new'){
            $order['id'] = desc;
        }
        //down=下载量
        if($_GET['rank']=='down'){
            $order['photo_view'] = desc;
        }
        $demand['rank']=$_GET['rank'];


        //尺寸
        if($_GET['size']){

            $demand['size']=$_GET['size'];
            if($_GET['size']!='all' && $_GET['size']!=''){
                $size = array('like','%'.$demand['size'].'%');
            }

        }

        if($format && $size){
            $where['photo_size']=array($size,$format);
        }else if($size){
            $where['photo_size']=array($size);
        }else if($format){
            $where['photo_size']=array($format);
        }
        
        $this->demand=$demand;
        
        $order['photo_rank'] = desc;

        $photo = M('photo'); // 实例化User对象
        $count      = $photo->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,54);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $photo->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);// 赋值分页输出
        

        //判断用户是否登陆

        if($_SESSION['uid']){

            $praise=M('collect');

            $like = $praise->where(array('like_id'=>'2','genre'=>'1','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $photoPraise = photoPraise($list,$like);

            $photoCollect = $praise->where(array('like_id'=>'1','genre'=>'1','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $data = photoCollect($photoPraise,$photoCollect);

            $this->photo = $data;

        }else{

            $this->photo = $list;

        }
        $this->display();

    }

    //ajax相册详情

    public function ajaxPhotoPage(){

        if($_POST['id']){



            $data=M('photo')->where(array("id"=>$_POST['id']))->find();



            $praise=M('collect');

            //点赞
            $like = $praise->where(array('like_id'=>'2','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $praises = in_array($data['id'], $like)?1:0;


            //收藏
            $Collect = $praise->where(array('like_id'=>'1','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $Collect = in_array($data['id'], $Collect)?1:0;

            $json_arr = array('data'=>$data,'WebSite'=>'1','praise'=>$praises,'collect'=>$Collect);

            $this->ajaxReturn($json_arr);

        }else{

            $json_arr = array('WebSite'=>'0');

            $this->ajaxReturn($json_arr);

        }

        

    }

    //跳页面详情

    public function page(){

        if($_GET['id']){

            $data=M('photo')->where(array("id"=>$_GET['id']))->find();

            $this->data = $data;
            $praise=M('collect');

            //赞
            $like = $praise->where(array('like_id'=>'2','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $this->praises = in_array($data['id'], $like)?1:0;

            //收藏
            $Collect = $praise->where(array('like_id'=>'1','user_id'=>$_SESSION['uid']))->getField('works_id',true);

            $this->Collect = in_array($data['id'], $Collect)?1:0;

            //图集
            $this->photo_atlas = explode(",",substr($data['photo_atlas'],0,$Photo['photo_atlas']-1));

            //评论
            $this->Comment = M('comment')

            ->join('x_user ON x_user.id = x_comment.user_id')

            ->where(array('photo_id'=>$_GET['id']))->order('time asc')->select();
            
            $this->display();

        }else{

            $this->error('页面跳转失败');

        }  

    }



    //点赞&收藏

    //取消收藏&取消点赞

    public function ajaxCollect(){

        if (!$_SESSION['uid']) {
            $this->error('登陆后在进行操作',3);
        }

        $Model = M('collect'); // 实例化collect对象

        $data = array(

                'like_id'  => $_GET['like'],

                'works_id' => $_GET['id'],

                'genre' => $_GET['genre'],

                'user_id'  => $_SESSION['uid'],

            );
        
        if($Model->where($data)->delete()){

            if($_GET['like']==2){

                $User = M("photo");

                $data = $User->where(array('id'=>$_GET['id']))->setDec('photo_like');

            }

            $this->success('取消成功',1);

            

        }else{

            if($Model->data($data)->add()){

                if($_GET['like']==2){

                    $User = M("photo");

                    $arr = $User->where(array('id'=>$_GET['id']))->setInc('photo_like');

                }

                $this->success('收藏成功',2);

            }else{

                $this->error('收藏失败');

            }

        }

    }

    //评论点赞

    public function ajaxComment_Praise(){
        if (!$_SESSION['uid']) {
            $this->error('登陆后在进行操作',3);
        }
        $collect = M('collect');

        $data = array(

                'works_id' => $_GET['id'],

                'genre' => 2,

                'user_id'  => $_SESSION['uid'],

            );

        $string=$collect->where($data)->find();
        if($string){
            if($collect->where($data)->delete()){
                M('comment')->where(array("this_id"=>$_GET['id']))->setDec('approval');
                $con = 0;
            }
        }else{
            if($collect->data($data)->add()){
                M('comment')->where(array("this_id"=>$_GET['id']))->setInc('approval');
                $con = 1;
            }
        }
        $praise=M('comment')->where(array("this_id"=>$_GET['id']))->field("approval")->find();
        $this->ajaxReturn(array("con"=>$con,"count"=>$praise['approval']));
    }

    public function download(){
        if(!$_SESSION['uid']){
            $this->redirect('Home/User/Landing');
        }
        $data = M("photo")->where(array('id'=>$_GET['id']))->getField('photo_url');
        Header("HTTP/1.1 303 See Other"); 
        Header("Location: $data"); 
        exit;
    }

    //评论
    public function discuss(){
        if(!$_SESSION['uid']){
            $this->error('请登录后在评论','Home/User/Landing');
        }else{
            $_POST['user_id'] = $_SESSION['uid'];
            $_POST['time'] = date('Y-m-d H:i:s',time());
            if(M('comment')->add($_POST)){
                $this->success('评论成功','loca');
            }else{
                $this->error('评论失败');
            }
        }
    }

}