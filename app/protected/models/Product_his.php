<?php
class Product_his extends CActiveRecord
{
	public static function get()
	{
		return new Product_his();
	}
	public function tableName()
	{
		return "Product_his";
	}
}