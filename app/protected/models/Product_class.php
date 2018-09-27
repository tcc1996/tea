<?php
class Product_class extends CActiveRecord
{
	public static function get()
	{
		return new Product_class();
	}
	public function tableName()
	{
		return "Product_class";
	}
}