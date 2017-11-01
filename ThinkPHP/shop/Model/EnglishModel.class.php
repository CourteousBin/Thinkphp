<?php
namespace Model;
use Think\Model;
	
	class EnglishModel extends Model {

//解决问题 : 在config文件设置了表前缀 ,但是 要操作没有前缀的 数据表 就要用这个		
		//实际数据表名(包含表前缀)
		protected $trueTableName = 'english';
		
	}

?>