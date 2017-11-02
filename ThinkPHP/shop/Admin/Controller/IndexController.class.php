<?php

//命名空间
namespace Admin\Controller;
use Think\Controller;

	class IndexController extends Controller {
		function head(){
			$this->display();
		}
		
		function left(){
// 权限管理

	// 战略:admin_id-->role_id-->auth_ids
	// 通过管理员id 找到 角色id 再找到 权限id

			// 获得管理员id
			$admin_id = session('admin_id');
			$admin_name = session('admin_name');

			// 从数据库获得管理员信息
			$admin_info = D('Manager')->find($admin_id);
			$role_id = $admin_info['mg_role_id'];

			// 角色信息
			$role_info = D('Role')->find($role_id);
			$auth_ids = $role_info['role_auth_ids'];	//权限id信息

			// 全部权限信息
			// $auth_info = D('Auth')->select($auth_ids);	
			// dump($auth_info);exit;

			// 这样写的sql语句 没有卵用,  后者还是会覆盖前者
			// $auth_infoA = D('Auth')->where('auth_level=0')->select($auth_ids);	//返回全部权限信息
			// $auth_infoB = D('Auth')->where('auth_level=1')->select($auth_ids);	//返回全部权限信息

			// IN 操作符允许我们在 WHERE 子句中规定多个值。
			// 区分超级管理员 与 其他
			if($admin_id === '3'){
				$auth_infoA = D('Auth')->where("auth_level=0")->select();
				$auth_infoB = D('Auth')->where("auth_level=1")->select();
			}else {
				$auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
				$auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
			}
			


			// 用 if 标签的时候 , 不能出现 . < > 要用 其他方式使用
			// <if condition="$B['auth_pid'] == $A['auth_id']">

			$this->assign('auth_infoA',$auth_infoA);
			$this->assign('auth_infoB',$auth_infoB);
			$this->display();
		}
		
		function right(){
			$this->display();
		}
		
		function index(){
			$this->display();
		}
	}

	
?>