<?php
	include 'db_connect.php';
	$query="SELECT country, round((jan+feb+mar+apr+may+jun)/6,2) AS 'avg' from DATA_TB2";
	$result=mysql_query($query);
	$final =array();
	while($data=mysql_fetch_array($result)){
		$arr['country']=urlencode($data['country']);
		$arr['avg']=$data['avg'];
		array_push($final, $arr);
	}
	$json = json_encode($final);
	echo urldecode($json);
	include 'db_disconnect.php';
?>
