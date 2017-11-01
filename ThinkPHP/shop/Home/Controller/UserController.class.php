<?php
	//命名空间
namespace Home\Controller;  // 声明命名空间
use Think\Controller;       // 空间类元素引入
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
    	$user = new \Model\UserModel();
    	//两个逻辑:展示 收集
    	if(!empty($_POST)){
    		//提交复选框的时候 , 是传过来的一个数组 , 我们要转换成字符串
    		//$_POST['user_hobby'] = implode(',',$_POST['user_hobby']);
    		
    		//收集表单 , 过滤表单信息 , 非法字段过滤 , 表单自动验证;
    		//并把处理好的信息返回
    		$info = $user->create();
            // 通过create 返回值, 判断是否验证成功
            // 返回array实体内容 表示验证成功, 如果返回的是一个false , 则失败
    		if($info){
                // 把爱好处理成字符串 , 注意此时 不是$_POST , 而是 $info;
                $info['user_hobby'] = implode(',',$info['user_hobby']);
        		$z = $user->add($info);
                if($z){
                    $this->redirect('index/index/',array(),2,'注册成功');
                }

            }else{
                // 验证失败的错误信息
                $err = $user->getError();
                // 输出到模板    ,   $err是一个二维数组 , 那么在html 就要$errorinfo.xxxx 来进行输出
                $this->assign('errorinfo',$err);
            }
    		
    	}
    		$this->display();    		
    }
}