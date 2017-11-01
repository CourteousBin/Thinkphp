<?php
return array(
	
//这样设置解决的问题是  分组问题
//	http://localhost:8080/thinkphp/shop/index.php/Admin/index/index
			//									----------
											//可以省略分组信息  
											
//省略的话 默认就是 HOME ,		注意结尾是 , 而不是 ;		
									
	//设置默认分组
	'DEFAULT_MODULE'	=>	'Home',
	//允许访问的分组信息
	'MODULE_ALLOW_LIST'	=>	array('Home','Admin'),
	
	//设置默认模板
	//'TMPL_ENGINE_TYPE'      =>  'Smarty',     // 默认模板引擎 以下设置仅对使用Think模板引擎有效
	
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkphp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'ehui2014',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
	
);