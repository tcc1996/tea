<?php
class Adminhit_view extends CActiveRecord
{
	public static function get()
	{
		return new Adminhit_view();
	}
	public function tableName()
	{
		return "Adminhit_view";
	}
}