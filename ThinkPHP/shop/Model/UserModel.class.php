<?php
	
namespace Model;
use Think\Model;
	
	//goods模型类
	//父类 THINKPHP/Library/Think/Module.class.php
	class UserModel extends Model{

		// 是否批量现实错误信息
		protected $patchValidate = true;

		// 通过定义$_validate成员 , 设置表单验证规则
		protected $_validate = array(
			// array(字段,规则,错误提示,[验证条件,附加规则,验证时间]);
				// 用户名验证规则
			array('username','require','用户名必须填写'),
			array('username','','用户名被注册',0,'unique'),
			array('password','require','密码必须填写'),
			array('password2','require','确认密码必须填写'),
			array('password2','password','两次密码必须保持一致',0,'confirm'),
			array('user_email','email','邮箱格式不正确'),
			array('user_qq','number','qq号码必须是数字'),
			array('user_qq','5,12','qq号码5-12位',0,'length'),
			// // 学历验证必须选择一个
			array('user_xueli','2,5','学历验证必须选择一个',0,'between'),
			// 爱好验证
			// 0 表示存在post 里面的验证 , 1 表示 就算你不提交post , 我都验证 , 2表示 不填写, 就不验证
			array('user_hobby','check_hobby','爱好必须选择两项',0,'callback'),

			// 第四个验证时间参数 , 1 2 3 , 1新增数据时候验证 ,2编辑数据时候验证 , 3全部情况下验证（默认）
			// array('verify','require','验证码必须！'), 都有时间都验证
     		// array('name','checkName','帐号错误！',1,'function',4),  只在登录时候验证
     		// array('password','checkPwd','密码错误！',1,'function',4), 只在登录时候验证
		);

		// 定义一个方法进行爱好验证
		// $arg代表被验证的表单信息
		function check_hobby($arg){
			// dump($arg);	是一个二维数组 , 里面是你选择的内容	
			if(count($arg)<2){
				return false;	//返回false 出现 错误提示;
			}
			return true;
		}
	}
?>