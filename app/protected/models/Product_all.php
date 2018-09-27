<?php
class Product_all extends CActiveRecord
{
	public static function get()
	{
		return new Product_all();
	}
	public function tableName()
	{
		return "Product_all";
	}
}