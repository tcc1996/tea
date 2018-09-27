<?php
class ErrorController extends BaseController
{
	public function actionIndex()
	{
		$this->setPageTitle("系统错误页面");
		
		//获得当前的错误信息
		$arr = Yii::app()->errorHandler->error;
		
		
		
		$this->render("index",$arr);
	}
}











