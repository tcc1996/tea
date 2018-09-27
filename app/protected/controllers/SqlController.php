<?php
class SqlController extends BaseController
{
	public function actionIndex()
	{
		$this->setPageTitle("执行sql语句");
		
		//通过sql语句查询多条记录
		$db = Yii::app()->db;
		$stmt = $db->createCommand("select * from bbsInfo");
		$rs = $stmt->queryAll();
		
		$this->render("index",array(
			"bbsInfo"=>$rs
		));
	}
	//删除记录
	public function actionDelete($bbsId)
	{
		$db = Yii::app()->db;
		$stmt = $db->createCommand("delete from bbsInfo where bbsId={$bbsId}");
		$result = $stmt->execute();
		
		
		$this->redirect("index.php?r=success/index/act/sqldel/rst/{$result}");
	}
}















