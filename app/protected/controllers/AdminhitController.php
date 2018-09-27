<?php 
/**
* 历史纪录控制器
*/
class AdminhitController extends BaseController
{
	/*渲染登陆历史页面*/
	function actionIndex($start=1)
	{
		$condi = Yii::app()->session['userinfo'];
		if ($condi['eoc']==1) {
			$this->redirect("index.php?r=adminhit/error");
		}
		$model = Adminhit_view::get();
		$result = $model->findAll(array(
			'select' => '*',
			'order' => 'datetime desc',
			'offset'=> $start*20-20,
			'limit'=> 20
			 ));
		$hitnum = $model->count();//获取总数
		$allpage=ceil(($hitnum)/20);//取整获取分页总页数
		$this->render("index",array(
			"hits"=>$result,
			"hitnum"=>$hitnum,
			"start"=>$start,
			"allpage"=>$allpage,
			));
	}

	/*权限管理-权限不够提示*/
	function actionError(){
		$this->render('error');
	}

	/*登陆记录删除程序*/
	function actionDel($id){
		$rst = Adminhit::get()->deleteByPk($id);
		echo $rst;
	}

	/*登陆记录批量删除程序*/
	function actionDelall(){
		$num = $_POST['id'];
		$ret = Adminhit::get()->deleteByPk($num);
		echo $ret;
	}
}