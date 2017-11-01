<?php
	
	//如果设置utf8格式 那么要在入口文件设置
header('content-type:text/html;charset=utf8');
	//重新学习 thinkphp 框架开发
	//入口程序文件
	
	//设置系统模式(开发模式 , 能够提示错误)	
	define('APP_DEBUG',true);
	
	//define('APP_DEBUG',true);生产模式 不提示哪里出错;
	
	// showlist 图片地址 常量
	define('SITE_URL','http://127.0.0.1/ThinkPHP/shop/');

	//静态资源前台文件设置访问 常量 路径
	define('CSS_URL','/thinkphp/shop/Home/public/css/');
	define('IMG_URL','/thinkphp/shop/Home/public/images/');
	define('JS_URL','/thinkphp/shop/Home/public/js/');
	
	//静态资源后台文件设置访问 常量 路径
	define('ADMIN_CSS_URL','/thinkphp/shop/Admin/public/css/');
	define('ADMIN_IMG_URL','/thinkphp/shop/Admin/public/img/');
	
	
//	__MODULE__: 路由地址分组信息 （/shop/index.php/分组）
//	__CONTROLLER__: 路由地址控制器信息  （/shop/index.php/分组/控制器）
//	__ACTION__:路由地址操作方法信息 （/shop/index.php/分组/控制器/操作方法）
//	__SELF__: 路由地址的全部信息(/shop/index.php/分组/控制器/操作方法/名称1/值/名称2/值）
//	MODULE_NAME:  分组名称
//	CONTROLLER_NAME：控制器名称
//	ACTION_NAME: 操作方法名称

	
	//引入借口文件 thinkphp
	include('../ThinkPHP3.2.3/ThinkPHP.php');
	//入口文件以下写的代码不会被执行;
?>