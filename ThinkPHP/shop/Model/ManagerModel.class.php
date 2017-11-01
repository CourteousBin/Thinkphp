<?php

namespace Model;
use Think\Model;

class ManagerModel extends Model{
	// 校验用户名和密码
	function checkNamePwd($name , $pwd){

		// 先根据$sname 查询是否存在数据记录
		// $z 有信息返回整条记录 , 没有就返回null;
		$z = $this -> where("mg_name='$name'")->find();
		
		if($z){
			if($z['mg_pwd'] == $pwd){
				return $z;
			}
		}

		return null;
	}
}