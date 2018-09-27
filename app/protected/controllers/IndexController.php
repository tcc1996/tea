<?php
class IndexController extends Controller
{
	/*渲染首页框架*/
	public function actionIndex()
	{
		$this->setPageTitle("网站首页");
		
		$this->render("index");
	}
}











