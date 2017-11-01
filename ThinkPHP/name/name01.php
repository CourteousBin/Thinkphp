<?php

	// 命名空间
	// function getInfo(){
	// 	echo "dog";
	// }

	// function getInfo(){
	// 	echo "pig";
	// }

	// 两个 一样的函数是会报错

	// 空间的命名与具体的上级目录没有直接关系
	// 按照php正确的命名方式定义
	// namespace jj18cm;
	// function getInfo(){
	// 	echo "18cm";
	// }
	// getInfo();
	// const HOST = '127.0.0.1';
	// define('USER','abc');

	// namespace jj3cm;
	// function getInfo(){
	// 	echo "1mm";
	// }
	// getInfo();
	// const HOST = '124.1.1.1';
	// define('USER', 'ABC');

	// php中 定义常量的方式有两种 , const 名称 = 值 ; define(名称,值);
	// 区别在于 , define可以无视命名空间 , 也就是命名空间对他不起作用
	// define('Admin','123');	在jj18cm;	报错
	// define('Admin','456');	在jj3cm ;	报错
	// const 会被 命名空间影响;


	//访问其他空间元素:	\空间\元素
	// \jj18cm\getInfo();


	// 多级空间使用
	namespace guangdong\foshan\nanhai;
	class Animal{

		public $name = 'wolf';

	}

	namespace liaoning\shenyang\tiexi\jb;
	class Animal{

		public $name = 'ox';
	}


	namespace liaoning\shenyang\tiexi;
	class Animal{

		public $name = 'tiger';	
	}

	// 非限定名称 方式访问元素
	$obj = new Animal();
	echo $obj->name;


	// 访问其他命名空间元素
	// 完全限定名称方式访问元素
	$obj1 = new \guangdong\foshan\nanhai\Animal();
	echo $obj1->name;

	// 限定名称 访问元素
	// 非完全限定名称方式访问 , 会将当前空间 结合 你输入的空间进行访问
	// \guangdong\foshan\nanhai\nanhai\Animal();
	// 注意 非完全限定 不用加 \jb\Animal()  而是 jb\Animal()
	$obj2 = new jb\Animal();
	echo $obj2->name;