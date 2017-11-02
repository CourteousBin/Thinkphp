<?php

namespace Model;
use Think\Model;

class RoleModel extends Model{
	// 权限分配数据表制作和更新
	// 参数:$authid array(你选择的权限) , $role_id 身份
	function saveAuth($authid,$role_id){

		// 把$autoid 变为 str ;
		$authids = implode(',', $authid);

		// 根据$authid 查询分配权限信息 , 获得他们控制器和操作方法 , 并拼装成字符串
		$auth_info = D('Auth')->select($authids);

		$s = '';
		foreach ($auth_info as $key => $value) {
			if(!empty($value['auth_c']) && !empty($value['auth_a'])){
				$s .= $value['auth_c']."-".$value['auth_a'].",";
			}
			
		}

		$s = rtrim($s,',');

		$sql = "update sw_role set role_auth_ids='$authids',role_auth_ac='$s' where role_id ='$role_id'";
		$sql = "update sw_role set role_auth_ids='$authids',role_auth_ac='$s' where role_id='$role_id'";

		// execute()和query()方法都可以在参数里直接输入sql语句。但是不同的是execute()
		// 通常用来执行insert或update等sql语句，而query常用来执行select等语句。 
		// execute()方法将返回影响的记录数，如果执行sql的select语句的话，返回的结果将是表的总记录数：
		dump($this -> execute($sql));

	}
}