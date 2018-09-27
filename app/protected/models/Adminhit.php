<?php
class Adminhit extends CActiveRecord
{
	public static function get()
	{
		return new Adminhit();
	}
	public function tableName()
	{
		return "Adminhit";
	}
}