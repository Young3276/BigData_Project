<?php
	header("Content-Type:text/html; charset=UTF-8");
	$host="10.110.239.148:8888";
	$user="dyoung";
	$pwd="tjxmdlqslek";
	$dbName="DATA";
	$connect=mysql_connect($host, $user, $pwd)or die(mysql_error());
	mysql_query("SET NAMES UTF-8");
	mysql_select_db("$dbName", $connect);
?>
