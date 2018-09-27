<?php
class BaseController extends CController
{
	public $adminid = null;
	public $adminname = null;
	/*验证管理员信息*/
	public function init()
	{
		$usr = Yii::app()->session['userinfo'];
		/*验证管理员是否登陆*/
		if ($usr['id'] == "") {
			$this->redirect("index.php?r=success/index/act/login/rst/0");
		}else {
			$userinfo = Adminer::get()->findByPk($usr['id']);
			/*验证管理员信息是否发生了变化*/
			if ($usr['adminnum']!=$userinfo['adminnum']||$usr['adminname']!=$userinfo['adminname']||$usr['password']!=$userinfo['password']) {
				Yii::app()->session->clear();
				Yii::app()->session->destroy();
				$this->redirect("index.php?r=success/index/act/reset");
			}else {
				$this->adminname=$userinfo['adminname'];
			}
		}
		
	}
}

