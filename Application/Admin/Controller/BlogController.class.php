<?php



namespace Admin\Controller;



use Admin\Controller\CommonController;



class BlogController extends CommonController{



	//加载公共



	function _initialize() {



		parent::_initialize();



	}

    public function stencil(){
        $data=M('photo');
        $map['photo_sort'] = array('like','%'.$_GET['photo_sort'].'%');
        $map['photo_del'] = '1';
        $list = $data->where($map)->order('id desc')->page($_GET['p'].',20')->select();
        $this->assign('data',$list);// 赋值数据集
        $count      = $data->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }



    //添加模板
     public function addStencil(){
        $classify = array(
            array('name'=>'婚纱','id'=>'1'),
            array('name'=>'儿童','id'=>'2'),
            array('name'=>'写真','id'=>'3'),
            );
        if($_GET){
            //获取文章内容
            $Photo=M('Photo')->where(array('id'=>$_GET['id']))->find();
            $this->Photo = $Photo;
            //拆分图集
            if($Photo['photo_atlas']){
                $photo_atlas = rtrim($Photo['photo_atlas'],',');
                $this->pieces = explode(",", $photo_atlas);
            }
            //拆分分类
            if($Photo['photo_sort']){
                $photo_sort = rtrim($Photo['photo_sort'],',');
                $pieces = explode(",", $photo_sort);
                $class = photo_opt($classify,$pieces,id);
                $this->classify=$class;
            }
            
        }else{
            $this->classify=$classify;
        }
        $this->display();
    }


    // 删除到垃圾站
    public function del(){
        // dump($_GET);die;
        //删除/回复是否成功
        if(M('photo')->where(array('id'=>$_GET['id']))->save(array('photo_del'=>$_GET['del']))){
            // $_GET['del']为1是回复2是删除
            if($_GET['del']=='1'){
                $this->redirect('Blog/dels');
            }else{
                $this->redirect('Blog/stencil', array('photo_sort' =>$_GET['photo_sort']));
            }
        }else{
            $this->error('修改失败');
        };
    }

    // 彻底删除
    public function pack(){
        $Model = M("photo"); // 实例化User对象
        if($Model->where(array('id'=>$_GET['id']))->delete()){
            $this->redirect('Blog/dels');
        }else{
            $this->error('彻底删除失败');
        }
    }
    public function dels(){
        $data=M('photo');
        $map['photo_del'] = '0';
        $list = $data->where($map)->order('id desc')->page($_GET['p'].',20')->select();
        $this->assign('data',$list);// 赋值数据集
        $count      = $data->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }




    public function addStencilHandle(){
        
        
        //获取列表中的图片
        $photo_atlass = '';
        foreach ($_POST['photo_atlas'] as $value) {
          $photo_atlass = $photo_atlass.$value.",";
        }

        //获取类别
        $classify = '';
        foreach ($_POST['photo_sort'] as $value) {
          $classify = $classify.$value.",";
        }
        $_POST['photo_sort'] = $classify;
        // 更新日期
        $_POST['change_time'] = date('Y-m-d H:i:s',time());
        // 图集
        $_POST['photo_atlas'] = $photo_atlass;
        if($_POST['photo_id']){
            if(M('photo')->where(array('id'=>$_POST['photo_id']))->save($_POST)){
                $this->success('更新成功',U('Blog/stencil'));
            }else{
                $this->error('添加失败');
            }
        }else{
            // 创建日期
            $_POST['create_time'] = date('Y-m-d H:i:s',time());
            // dump($_POST);die;
            if($uid=M('photo')->add($_POST)){
                    $this->success('添加成功',U('Blog/addStencil'));
            }else{
                $this->error('添加失败');
            }
        }
    }
    ///ajax图片上传
    public function ajax_upload() {
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $upload = new \Think\Upload($setting);
        $info   =   $upload->upload($_FILES);
        if($info) {
            $data=array(
              'error'=>0,
              'url'=>$info['imgFile']['url'],
             );
            exit(json_encode($data));
        } else {
            $json_arr = array('name'=>'上传失败'); 
            echo json_encode($json_arr);exit; 
        }
    }

    
}