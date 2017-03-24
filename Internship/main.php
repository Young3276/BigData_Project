<?php
	include 'db_connect.php';
	$query="SELECT country, code, jan, feb, mar, apr, may, jun FROM DATA_TB2";
	$result=mysql_query($query);
	while($data=mysql_fetch_assoc($result)){
		$arr['data'][]=$data;
	}
	echo json_encode($arr);
	include 'db_disconnect.php';	
?>
