<?php
class Adminer extends CActiveRecord
{
	//获得当前模型对象
	public static function get()
	{
		return new Adminer();
	}
	
	//指定当前模型对应的表名
	public function tableName()
	{
		return "adminer";//完整的表名
		//return "{{表名}}";//省略了前缀的表名
	}
}
