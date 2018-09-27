<?php 
/**
* 奶茶收银系统产品管理
*/
class ProductController extends BaseController
{
	/*渲染产品管理页面*/
	function actionAdmin()
	{
		$product = product_view::get()->findAll();

		$this->render('admin',array(
			'product'=>$product,
			));
	}

	/*渲染产品分类页面，
	@page必选参数，未未给定默认等于1*/
	function actionAdminclass($page=1)
	{
		$class = product_class::get();
		$num = $class->count();
		$pageall=ceil($num/20);
		$classification = $class->findAll(array(
			"offset"=> $page*20-20,
			"limit"=>20,
			'order'=>"datetime desc"
			));
		foreach ($classification as $k => $v) {
			$admin = adminer::get()->find("id={$v['aid']}");
			$number = product::get()->count("cid={$v['id']}");
			$array = array(
				'id'=>$v['id'],
				'classname'=>$v['classname'],
				'adminname'=>$admin['adminname'],
				'classnum'=>$number,
				'datetime'=>$v['datetime'],
				'isok'=>$v['isok']
				);
			$classification[$k]=$array;
		}
		$this->render('adminclass',array(
			'num' => $num, 
			'classification' => $classification,
			'pageall' => $pageall,
			'page'=>$page,
			));
	}

	/*添加分类视图渲染*/
	function actionAddclass()
	{
		$this->render('addclass');
	}

	/*添加分类处理应用*/
	function actionClassexe()
	{
		$classname = $_POST['classname'];
		$usr = Yii::app()->session['userinfo'];
		$proclass = product_class::get();
		if ($proclass->find("classname='{$classname}'")||$classname=="") {
			echo 0;
		}else{
			$proclass->aid = $usr['id'];
			$proclass->classname = $classname;
			$proclass->isok = $_POST['isok'];
			$result = $proclass->save();
			echo $result;
		}
	}

	/*产品分类是否启用控制器*/
	function actionUpclass($id)
	{
		$class = product_class::get()->findByPk($id);
		if ($class['isok']==0){
			$class['isok'] = 1 ; 
		}else{
			$class['isok'] = 0 ;
		}
		$rst = product_class::get()->updateByPk($id,$class);
		echo $rst;
	}

	/*渲染产品修改页*/
	function actionUpdata($id)
	{
		$class = product_class::get()->findByPk($id);

		$this->render("updata",array(
			'class'=>$class,
			));
	}

	/*修改分类页面程序*/
	function actionExeupclass($id)
	{
		$classname = $_POST['classname'];
		$proclass = product_class::get();
		if ($proclass->find("classname='{$classname}' and id!='{$id}'")){
			echo 0;
		}else{
			$rst = $proclass->updateByPk($id,$_POST);
			echo $rst;
		}		
	}

	/*删除分类程序*/
	function actiondelclass($id){
		$rst = product_class::get()->deleteByPk($id);
		echo $rst;
	}

	/*批量删除分类程序*/
	function actiondelallclass(){
		$num = $_POST['id'];
		$ret = product_class::get()->deleteByPk($num);
		echo $ret;
	}

	
}