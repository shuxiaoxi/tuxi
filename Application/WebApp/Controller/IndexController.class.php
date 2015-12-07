<?php

namespace WebApp\Controller;

use Think\Controller;

class IndexController extends CommonController {

    public function index(){
    	dump("移动端");
    }

    public function website(){
        $this->display();
    }
    

}