<?php
class TableController extends Controller
{
	public function actionIndex()
	{
		$this->setPageTitle("多表查询");
		
		//多表查询
		$newsInfo = NewsArticles::get()->findAll(array(
			"select"=>"articleId,b.typeName,title,dateandtime",
			"alias"=>"a",//给当前的新闻表起别名
			"join"=>"inner join newsTypes b on a.typeId=b.typeId",
			"order"=>"articleId",
		));
		
		
		
		$this->render("index",array(
			"newsInfo"=>$newsInfo
		));
	}
}















