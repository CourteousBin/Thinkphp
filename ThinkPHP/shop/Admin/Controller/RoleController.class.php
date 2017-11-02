<?php

	namespace Admin\Controller;
	use Think\Controller;

	class RoleController extends Controller {
		// 列表展示
		function showlist(){
			// 获得角色全部的数据
			$info = D('Role')->select();

			$this->assign('info',$info);
			$this->display();
		}

		// 分配权限
		function fenpei($role_id){

			// 实例化一个对象 , 在对象中 写方法;
			$role = new \Model\RoleModel();

			// 两个逻辑 一个展示 , 一个收集信息
			if(!empty($_POST)){

				// 在对象中 写 saveAuth 方法 , 对传过来的数据进行处理
				$z = $role -> saveAuth($_POST['authid'],$_POST['role_id']);
				// if($z){
				// 	$this->redirect('showlist',array(),1,'分配权限成功');
				// }else{
				// 	$this->redirect('showlist',array('role_id'=>$role_id),1,'分配权限失败');
				// }

			}else{

				// 根据role_id 获得被分配的角色信息;
				$role_info = $role->find($role_id);

				// 获得被分配的权限 , 并传递给模板使用
				$auth_infoA = D('Auth')->where('auth_level=0')->select();
				$auth_infoB = D('Auth')->where('auth_level=1')->select();


				$this->assign('auth_infoA',$auth_infoA);
				$this->assign('auth_infoB',$auth_infoB);
				$this->assign('role_info',$role_info);
				$this->display();			
				
			}

		}
	}
	
?>