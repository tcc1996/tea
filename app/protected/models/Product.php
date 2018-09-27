<?php
class Product extends CActiveRecord
{
	public static function get()
	{
		return new Product();
	}
	public function tableName()
	{
		return "Product";
	}
}