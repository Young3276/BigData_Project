<?php
	include 'db_connect.php';
	$query="SELECT country, round((jan+feb+mar+apr+may+jun)/6,2) AS 'avg' FROM DATA_TB2";
	$result=mysql_query($query);
	$arr[]=array('country','average');
	while($data=mysql_fetch_assoc($result)){
		$arr[]=array(urlencode($data['country']), (float)$data['avg']);
	}
	$json=json_encode($arr);
	echo urldecode($json);
	include 'db_disconnet.php';
?>
