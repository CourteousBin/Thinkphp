<?php
namespace Admin\Controller;
use Think\Controller;

	class GoodsController extends Controller {
		
		//学习MOdel 使用的
		function showlist_learn_M(){

//普通实例方法			
			//Module 是一个类 , 要实例化对象
			//$goods = new \Model\GoodsModel();
						
			//$english =new\Model\EnglishModel();
			//dump($english);

//基类 (父类)实例方法	
			//$obj = D() 可以使用原生方法
			
			$obj = D('User'); //实例化操作Model 对象 , 并且同时操作 数据库 sw_user	
							  //该方式 可以不用创建类 , 就可以操作sw_user表 , 但只是简单的操作
			$this->display();
		}
		
		function showlist_learn_SELECT(){
//数据操作 查询
			$goods = new \Model\GoodsModel();
			
			//$info = $goods ->select(); SELECT * FROM 'sw_goods';
			
			//查询主键 为 17
			//$info = $goods ->select(17); SELECT *FORM 'sw_goods' WHERE 'goods_id' = 17;
			
			//查询主键为 21 24 39 30
			$info = $goods ->select("21,24,29,30");//SELECT *FORM 'sw_goods' WHERE 'goods_id' IN ('21','24');
			
			$this->assign('info',$info);
			$this->display();
		}
		
		function showlist__Auxiliarymethod(){	//辅助方法
			
			$goods = D('Goods');
			
//where 设置查询条件
			//$goods -> where(把sql where 后边的信息 当做参数传递进来)
			
			//SELECT * FORM 'sw_goods' WHERE (goods_name like '诺%' and goods_price > 1000);
//			$goods->where('goods_name like "诺%" and goods_price> 1000');
			
//			$info = $goods->select();
			
//limit 限制查询条件
			
			//$goods->limit(3);
			//$goods->where('goods_name like "诺%" and goods_price> 1000');
				//小总结 , 依次把查询条件 加到$goods , 然后一次性执行 select();
			
			//偏移量: 一页的长度
			//计算公式:(当前页码-1)*长度
			//比如 我想分页 , 每页7条数据 那么 使用偏移量
			//$goods->limit(14,7);
			//14计算过程 : 第三页 减去 1 再乘以 7 , 那么第三页的数据是 (14,7);	第四页就是(21,7);			
			//$info = $goods-> select();

//field 限制查询字段
			
			//SELECT 'goods_id','goods_price' FROM 'sw_goods';
			//$goods->field('goods_id,goods_price');
			//$info = $goods->select();			
						
//order 排序查询
			
			//价格从小到达 升序
			$goods->order('goods_price');
			
			//价格从大到小 降序
			//$goods->order('goods_price desc');
			$info = $goods->select();	

//group 分组查询
			
			//解释下 分组查询
			
			//查找每个品牌下 商品的总数量
			//select  goods_brand_id , count(*) from sw_goods group by goods_brand_id ;
			
			//查找每个品牌下 最高价格				
			//select  goods_brand_id , max(goods_price) from sw_goods group by goods_brand_id ;
			
			//查找每个品牌下 最低价格				
			//select  goods_brand_id , min(goods_price) from sw_goods group by goods_brand_id ;
			
			//查找每个品牌下 平均价格				
			//select  goods_brand_id , avg(goods_price) from sw_goods group by goods_brand_id ;
			
			//查找每个品牌下 算术和			
			//select  goods_brand_id , sum(goods_price) from sw_goods group by goods_brand_id ;
			
			//每个品牌下 总数量
			//$goods->group('goods_brand_id');
			//$goods->field('goods_brand_id,count(*)');
			//$info = $goods -> select();
			
			//dump($info);
				
//having 查询关键字
			
			//解释一下 having  和 where 的区别
			//1.分组查询可以使用having
			//2.不分组查询也可以使用having
			//3.where 条件字段 必须是 "数据表存在的" 字段
			//4.having 条件字段必须是 "结果集 "
			
			//用法A: where having 通用
			//select * from sw_goods where goods_price > 1000;   goods_price 数据表有这个字段
			//select * from sw_goods having goods_price > 1000;
			
			//用法B:只能用where 不能用 Having
			//select goods_name from sw_goods where goods_price > 1000;	
			//select goods_name from sw_goods having goods_price > 1000; goods_name 结果集没有 goods_price 不用用;
			
//			$goods->having('goods_price>1000');
//			$info = $goods->select();

//delete 删除数据操作
			//$z = $model -> where("password='123'") -> delete();
			
			//or	
			
			//$model -> user_id = 8;
			//$z = $model -> delete();
			
			//or
			
			//$z = $model -> delete(10);
			
			//or
			
			//$z = $model -> delete("10,21");	//id 为 10-21
			
//原生sql语句
			//$sql = "xxxxx";
			//1.查询:	$model->query($sql);	//返回一个二维数组结果
			//2.添加删除修改语句:	$model->execute($sql);	//返回受影响记录条数
						
									
			$this->assign('info',$info);
			$this->display();
		}
		
		function showlist_lgcz(){
			//连贯操作
			$goods = D('Goods');
			
			$info = $goods->where('goods_price>1000')->field('goods_name,goods_price')->select();
			
			$this->assign('info',$info);
			$this->display();
		}
		
		function showlist(){

// 实现分页效果
			$goods = D('Goods');

			// 获得数据总条数
			$total = $goods -> count();	// select count(*) from sw_goods;
			$per = 7;	// 每页显示7条

			// 实例化对象 分页工具类
			$page_obj = new \Tools\Page($total,$per);

			// 拼装sql 语句 , 获得每页信息
			$sql = "select * from sw_goods order by goods_id desc ".$page_obj->limit;
			$info = $goods -> query($sql);
			
			// 获得页码列表
			$pagelist = $page_obj->fpage(array(3,4,5,6,7,8));

			// 在模板显示
			
			$this->assign('pagelist',$pagelist);
			$this->assign('info',$info);
			$this->display();
		}
		
		function tianjia_czlx(){//添加操作练习
			
			$goods = D('Goods');
			
//数组方式添加数据
			
			//$arr = array(
			//于数据库字段 一样
			//	'goods_name'=>'iphone7s',
			//	'goods_price'=>6500,
			//	'goods_weight'=>115,
			//	'goods_number'=>15
			//);
			
			//$z = $goods->add($arr);			
			//dump($z);
			
//AR方式添加数据
			
//			$goods -> goods_name = "samsung7";
//			$goods -> goods_price = 4600;
//			$goods -> goods_number = 20;
//			$goods -> goods_weight = 123;
//			
//			$z = $goods->add();
//			dump($z);

					
			$this->display();

		}
		
		function tianjia(){
			
			$goods = D('Goods');

// 文件上传			
			//两个逻辑 商品展示 , 收集信息
			if(!empty($_POST)){

				// 查看上传文件的信息
				// dump($_FILES);
				if($_FILES['goods_pic']['error'] == 0 ){

					// 配置上传文件信息
					$cfg = array(
						'rootPath'      =>  './Uploads/',
					);

					$up = new \Think\Upload();
					// 上传单个文件 , $_FILES['...'] , 上传多个文件 $_FILES 就可以;
					// uploadOne 会返回上传在服务器 名字 和 路径 等信息 ;
					$z = $up -> uploadOne($_FILES['goods_pic']);

					// 提示报错
					// dump($up->getError());
					// dump($z);

					// 把上传好的图片保存在数据表里面
					$bigpathname = $up->rootPath.$z['savepath'].$z['savename'];	// 图片路径名	

					// 把路径名 写进 post 里面 , 让 add 添加到数据库 
					$_POST['goods_big_img'] = $bigpathname;


// 缩略图		
					// 实例化对象
					$im = new \Think\Image();	

					// 打开要处理的图片
					$im -> open($bigpathname);

					// 制作缩略图	(默认有自适应的效果)
					$im -> thumb(125,125);

					// 缩略图的名字 要与 上传图片 区分 , 加前缀 small_
					$smallpathname = $up->rootPath.$z['savepath'].'small_'.$z['savename'];

					// 保存缩略图到服务器
					$im->save($smallpathname);

					$_POST['goods_small_img'] = $smallpathname;

					// 去掉 ./		这步可有可无
					//$_POST['goods_small_img'] = ltrim(smallpathname,'./');

				}
				
// 数据添加
				$z = $goods -> add($_POST);
				if($z){
					//页面跳转 $this->redirect($url,$params,$delay,$msg)
									//参数为(分组/控制器/操作方法,参数array,间隔时间,提示信息);
								//写showlist 不写控制器 默认为同一个分组 , 操作方法	
					$this->redirect('showlist',array(),2,'数据添加成功');				
							//Admin/Goods/showlist
				}else {
					$this->redirect('showlist',array(),2,'数据添加失败');		
				}
			}else {	
				//展示列表
				
				$this->display();
			}
			
		}
		
		function upd_sjxg(){	//数据修改练习
			
//数据修改操作
			$goods = D('Goods');
			
			//$goods->goods_id = 170;
			$goods->goods_name = 'iphone7s';
			$goods->goods_price = 998;
			$goods->goods_number = 123;
			
			
			//这样没写 where 定义关键字 , 默认是一次性修改全部数据库 数据 , mysql 是允许的 
			//实际项目中 , tp为了安全起见 , 禁止了 一次性修改 整张数据库;
			//要么 添加关键字 goods_id , 要么 使用where () 方法;
			
			$z = $goods->where('goods_id>144 and goods_id<150')->save();
			//返回的是修改的数量;
			dump($z);
					
			$this->display();

		}
		
		//三个形参 , 就是upd 给 url 里面传递进来的参数
		function upd($goods_id){
			
						  //	/Admin/Goods/upd/goods_id/172/jj/18cm
//			http:网址/index.php/分组/控制器/操作方法/名称/值/名称/值
//			控制器操作方法接收get参数：
//			并不是直接使用$_GET接收信息，而是通过方法的形式参数接收。
//			function  方法名称($名称,$名称){}
//			传递的get变量名称与方法形参变量的名称必须一致
			
//			dump($_GET);
			
			//获得被修改的产品信息
//			$info = D('Goods')->select($goods_id);	//返回一个二维数组
			
			//find()获得数据表信息记录 , 每次通过一维数组 返回一个记录结果;
			//mode对象->find();获得第一个记录结果;
			//model对象->find(数字);获得 指定主键 的记录结果
			//$info = D('Goods')->find($goods_id);	//返回一个一维数组;
			//原生:select * from 'sw_goods' WHERE 'goods_id' = 173 LIMIT 1;
			
			$goods=D('Goods');
			
			//两个逻辑
			if(!empty($_POST)){
				
				//修改信息 , 这是执行第二步
				$z = $goods->save($_POST);
				if($z){
					$this->redirect('showlist',array(),2,'数据修改成功');				
				}else {
					//如果修改失败 , 则跳回到 upd , 并且传递 id 值
					$this->redirect('upd',array('goods_id'=>$goods_id),2,'数据修改失败');		
				}
			}else {
				
				//点击修改按钮的时候 , 先是执行了 这一步
				$info = $goods->find($goods_id);
				
				$this->assign('info',$info);
				$this->display();
			}
					
		}
		
	}
?>