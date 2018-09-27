<?php 
/**
* 奶茶收银系统管理员信息控制器
*/
class MyadminController extends BaseController
{
	/*渲染个人信息页面*/
	function actionIndex()
	{
		$userinfo = Yii::app()->session['userinfo'];
		$userinfo['eoc']=$userinfo['eoc']==0?'超级管理员':'管理员';
		$this->render("index",array(
			'userinfo'=>$userinfo,
			));
	}

	/*管理员修改信息验证*/
	function actionExe($id)
	{
		$userinfo = Yii::app()->session['userinfo'];
		if ($_POST['oldpassword']==$userinfo['zspassword']) {
			$adminnum = $_POST['adminnum'];
			$rst = Adminer::get()->find("adminnum='{$adminnum}' and id!={$id}");
			if ($rst) {
				echo 3;
			}else{
				$array = array(
					'adminname' => $adminnum,
					'adminnum' => $_POST['adminnum'],
					'password' => md5($_POST['password']),
					'zspassword'=> $_POST['password']
					);
				$result = Adminer::get()->updateByPk($id,$array);
				if ($result) {
					echo 1;
				}else{
					echo 0;
				}
			}
		}else{
			echo 2;
		}

	}

	/*用户修改新账号重复检测*/
	function actionTishi($id,$adminnum)
	{
		$yanzhen1 = Adminer::get()->findByPk($id);
		if ($adminnum == $yanzhen1['adminnum']) {
			echo 3;
		}else{
			$rst = Adminer::get()->find("adminnum='{$adminnum}' and id!={$id}");
			if ($rst == "") {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
}