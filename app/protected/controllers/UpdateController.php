<?php
class UpdateController extends Controller
{
	public function actionIndex($bbsId)
	{
		$this->setPageTitle("修改记录");
		
		//查询当前记录
		//$bbsInfo = BbsInfo::get()->find();
		//$bbsInfo = BbsInfo::get()->find("bbsId={$bbsId}");
		//$bbsInfo = BbsInfo::get()->findByPk($bbsId);
		$bbsInfo = BbsInfo::get()->findBySql("select * from bbsInfo where bbsId={$bbsId}");
		
		
		$this->render("index",array(
			"bbsInfo"=>$bbsInfo
		));
	}
	//修改记录
	public function actionUpdate($bbsId)
	{
		//$result = BbsInfo::get()->updateAll($_POST);
		//$result = BbsInfo::get()->updateAll($_POST,"bbsId={$bbsId}");
		$result = BbsInfo::get()->updateByPk($bbsId,$_POST);
		
		$this->redirect("index.php?r=success/index/act/update/rst/{$result}/bbsId/{$bbsId}");
	}
}















