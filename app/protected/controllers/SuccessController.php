 <?php
class SuccessController extends CController
{
	/*默认跳转页面*/
	public function actionIndex($act,$rst=NULL)
	{
		
		$message = "";//提示信息
		$jumpUrl = "";//跳转地址
		
		if($act == "login")//登陆的错误信息
		{
			if($rst == 0)
			{
				$message = "请先登陆！";
				$jumpUrl = "index.php";
			}
		}elseif ($act == "reset") {
			$message = "检测到你的账户做了修改。请重新登陆！";
			$jumpUrl = "index.php";
		}
		
		
		
		$this->render("index",array(
			"message"=>$message,
			"jumpUrl"=>$jumpUrl
		));
	}

	/*成功提示跳转页*/
	public function actionSuccess($act,$rst=NULL){
		$message = "";//提示信息
		$jumpUrl = "";//跳转地址
		
		if($act == "colse")//登陆的错误信息
		{
			if($rst == 1)
			{
				$message = "退出成功，正在前往登陆页面！";
				$jumpUrl = "index.php";
			}
		}
		
		
		
		$this->render("index",array(
			"message"=>$message,
			"jumpUrl"=>$jumpUrl
		));
	}
}









