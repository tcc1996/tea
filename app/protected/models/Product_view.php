<?php
class Product_view extends CActiveRecord
{
	public static function get()
	{
		return new Product_view();
	}
	public function tableName()
	{
		return "Product_view";
	}
}