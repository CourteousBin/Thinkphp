<?php
	//命名空间
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	//登入系统
    function login(){
    	//调用视图模板
    	//$display(),其实是父类Controller方法

//this->display()使用的 三种 方式    	
    	//$this->display(); //视图模板名称与当前操作方法名称一致
    	
//  	$this->display('register');//能够访问同一文件夹 其他页面;
		
		//goods下的showlist模板
		$this->display('Goods/showlist');//访问其他控制器下的模板
    	
    }
    
    //注册系统
    function register(){
    	$this->display();
    }
}