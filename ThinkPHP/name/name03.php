<?php

	// 公共空间
	namespace bejing;
	function f1(){
		echo "公共空间";
	}

	// 被引入的空间 对 当前空间不发生影响
	include('name02.php');

	// 访问元素
	f1();

	// 访问被引入空间 的 方法;
	\guangdong\foshan\nanhai\getInfo();

	