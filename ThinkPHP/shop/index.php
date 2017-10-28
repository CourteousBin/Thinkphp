<?php
	
	//如果设置utf8格式 那么要在入口文件设置
header('content-type:text/html;charset=utf8');
	//重新学习 thinkphp 框架开发
	//入口程序文件
	
	//设置系统模式(开发模式 , 能够提示错误)	
	define('APP_DEBUG',true);
	
	//define('APP_DEBUG',true);生产模式 不提示哪里出错;
	
	//静态资源前台文件设置访问 常量 路径
	define('CSS_URL','/thinkphp/shop/Home/public/css/');
	define('IMG_URL','/thinkphp/shop/Home/public/images/');
	define('JS_URL','/thinkphp/shop/Home/public/js/');
	
	//静态资源后台文件设置访问 常量 路径
	define('ADMIN_CSS_URL','/thinkphp/shop/Admin/public/css/');
	define('ADMIN_IMG_URL','/thinkphp/shop/Admin/public/img/');
	
	//引入借口文件 thinkphp
	include('../ThinkPHP3.2.3/ThinkPHP.php');
	//入口文件以下写的代码不会被执行;
?>