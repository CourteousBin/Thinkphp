<?php

	// 多级空间使用
	namespace guangdong\foshan\nanhai;
	const USER = 'root';
	function getInfo(){
		echo "bread";
	}

	const HOST = 'localhost';

	namespace liaoning\shenyang\tiexi;
	const USER = 'admin';


	// 项目需要频繁 访问其他空间 元素
	// 如果需要访问方法 , HOST 那么就很麻烦 , 可以把频繁访问的空间写入到当前空间
	// 进而 通过 限定名称 方式访问元素;
	// echo \guangdong\foshan\nanhai\USER;
	// 引入空间
	use guangdong\foshan\nanhai;

	echo nanhai\USER;
	nanhai\getInfo();
	echo(nanhai\HOST);