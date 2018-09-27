<?php 
/**
* 只用功能型函数库
*/
class MyMian
{
	/*ip客户端ip地址记录存储*/
	function ipadress()
	{
	  $ip=false;
	  if(!empty($_SERVER["HTTP_CLIENT_IP"])){
	    $ip = $_SERVER["HTTP_CLIENT_IP"];
	  }
	  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
	    if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
	    for ($i = 0; $i < count($ips); $i++) {
	      if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
	        $ip = $ips[$i];
	        break;
	      }
	    }
	  }
	  return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}

	 /*截取给定大小的段落*/
	function sub($str,$offset)
	{
	 	$string=strip_tags($str);
	 	$arr=explode(" ",$string);
	 	$word=array_splice($arr,0,$offset);
	 	$param=join(" ",$word).'...';
	 	return $param;
	}



}