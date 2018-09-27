<?php
class AddController extends Controller
{
	public function actionIndex()
	{
		$this->setPageTitle("添加记录");
		
		
		
		$this->render("index");
	}
	//添加记录
	public function actionAdd()
	{
		$model = BbsInfo::get();
		$model->title = $_POST["title"];
		$model->clickTimes = $_POST["clickTimes"];
		$result = $model->save();
		
		if($result)
		{
			$this->redirect("index.php?r=success/index/act/add/rst/1");
		}
		else
		{
			$this->redirect("index.php?r=success/index/act/add/rst/0");
		}
	}
}











