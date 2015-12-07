<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class SetController extends CommonController{
	//加载公共
	function _initialize() {
		parent::_initialize();
	}

    public function index(){
    	$this->set = recursion(M('screen')->where(array('type'=>$_GET['type']))->order('sort')->select());
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function addSet(){
    	if($_POST){
			if(M("screen")->data($_POST)->add()){
                $this->addBuffer($_POST['type']);
				$this->success('添加成功', U('Set/index',array('type'=>$_POST['type'])));
			}
        }

    }
    public function sortSet(){
    	foreach ($_POST as $id => $sort){
    		M("screen")->where(array('id'=>$id))->setFIeld('sort',$sort);
    	}
        $this->addBuffer($_POST['type']);
    	$this->redirect('Set/index',array('type'=>$_POST['type']));
    }
    public function delSet(){
        if($_GET['remark']=='1'){
            $this->addBuffer($_POST['type']);
            M('screen')->where("id=%d || pid='%s'",array($_GET['id'],$_GET['id']))->delete();
        }else{
            $this->addBuffer($_POST['type']);
            M('screen')->where(array('id'=>$_GET['id']))->delete();
        }
    }
    public function amendSet(){
        $this->data = M('screen')->where(array('id'=>$_GET['id']))->find();
        $this->display();
    }
    public function altSet(){
        if($_POST){
            if(M("screen")->data($_POST)->save()){
                $this->addBuffer($_POST['type']);
                $this->success('添加成功', U('Set/index',array('type'=>$_POST['type'])));
            }
        }
    }
    // 缓存
    public function addBuffer($name){
        $data = recursion(M('screen')->where(array('type'=>$name))->order('sort')->select());
        F($name,$data);
    }
}