<?php
class HomeController extends BaseController
{
	/*渲染首页桌面窗口*/
	public function actionInit()
	{
		$this->setPageTitle("网站首页");
	
		//print_r($_SERVER);
		$mymian = new MyMian();
		$hostname = $mymian->ipadress();

		$this->render("init",array(
			'hostname'=>$hostname,
			));
	}


}











