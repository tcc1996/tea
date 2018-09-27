<?php 
/**
* 奶茶收银系统登陆控制器
*/
class LoginController extends CController
{
	/*渲染登陆页面*/
	function actionIndex()
	{
		$this->render("index");
	}

	/*用户名密码验证*/
	function actionLogin()
	{
		$mymian = new MyMian();
		$useradmin = $_POST['username'];
		$userinfo = Adminer::get()->find("adminnum='{$useradmin}'");
		if ($userinfo['id']<1) {
			echo '1';
		}else {
			$pwd = md5($_POST['password']);
			$admin = Adminhit::get();
			if ($pwd!=$userinfo['password']) {/*检测密码是否正确*/

				/*存入失败的登陆记录*/
				$admin->aid=$userinfo['id'];
				$admin->ipadress= $mymian->ipadress();
				$admin->sorf=0;
				$admin->save();
				echo '2';
			}else{
				/*存入成功的登陆记录*/
				$admin->aid=$userinfo['id'];
				$admin->ipadress= $mymian->ipadress();
				$admin->sorf=1;
				$admin->save();
				/*将用户信息存入session*/
				Yii::app()->session['userinfo']=$userinfo;
				echo '3';
			}
		}
	}

	/*用户退出验证*/
	public function actionColse(){
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		$this->redirect("index.php?r=success/success/act/colse/rst/1");
	}
}