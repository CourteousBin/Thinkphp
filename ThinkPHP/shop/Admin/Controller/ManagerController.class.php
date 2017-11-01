<?php
	
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

	class ManagerController extends Controller {
		
		//登入系统方法
		function login(){

			// 两个逻辑:展示表单 收集表单
			if(!empty($_POST)){

				// dump($_POST);
				// 验证码校验
				$vry = new Verify();

				if($vry->check($_POST['captcha'])){
// 登入验证

					// 验证用户名和密码
					$manager = new \Model\ManagerModel();

					// checkNamePwd 验证成功返回 记录 , 否则 null;
					$info = $manager -> checkNamePwd($_POST['admin_user'],$_POST['admin_psd']);

					// 如果验证成功
					if($info){

						// 给用户信息session持久化操作
						session('admin',$info['mg_id']);
						session('admin_name',$info['mg_name']);

						// 在模板输出为 {$Think.session.admin_name}

						// 页面跳转到后台
						$this->redirect('Index/index');

// tp框架中的session 和 cookie 
	// session(name);	获得指定session信息
	// session(name,value);	设置session信息
	// session(name,null);	删除指定session信息
	// session(null);		清空session信息	

	// cookie(name);	获得指定cookie信息
	// cookie(name,value,time);	设置cookie信息
	// cookie(name,null);	删除指定cookie信息
	// cookie(null);		清空cookie信息						

					}else {
						echo "用户名和密码错误";
					}

				}else {
					echo "验证错误";
				}

			}

				 $this->display();
		}


		function logout(){
			session(null);
			$this->redirect('Manager/login');
		}


		// 输出验证码
		function verifyImg(){

			// 设置验证码 , 路径在 ThinkPHP3.2.3/Library/Think/verify.class.php
			$cfg = array(
				'imageH'    =>  35,               // 验证码图片高度
        		'imageW'    =>  100,               // 验证码图片宽度
        		'length'    =>  4,               // 验证码位数
        		'fontSize'  =>  15,              // 验证码字体大小(px)

        		// fontttf 是设置用地几套字体 , 第四套最清晰 好认 
        		// 路径在 ThinkPHP3.2.3/Library/Think/Verify/ttfs
        		'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
			);
			// 实例化verify类对象
			$very = new Verify($cfg);
			$very -> entry();
		}
		
	}

?>