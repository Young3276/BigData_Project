<?php
        header("Content-Type:text/html; charset=UTF-8");
        $host="localhost";
        $user="root";
        $pwd="tjxmdlqslek";
        $dbName="TEST";
        $connect=mysql_connect($host, $user, $pwd)or die(mysql_error());
        mysql_query("SET NAMES UTF-8");
        mysql_select_db("$dbName", $connect);
	$result=mysql_query("SELECT * FROM Test");
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="./materialize/css/dataTables.jqueryui.css"/>
		<link rel="stylesheet" type="text/css" href="./materialize/css/materialize.css"/>
		<link rel="stylesheet" type="text/css" href="./materialize/css/mystyle.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<!-- js-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="./materialize/js/materialize.js"></script>
		<script type="text/javascript" src="./materialize/js/jquery.dataTables.js"></script>
	</head>
	<body>
		<?php include 'navbar.php'?>
		<div class="center-align">
			<h2> Young's Assignment </h2>
			<div class="space"></div>
			<h3> STEP 02 </h3>
                        <h6>여기서부터는 DB Data!</h6>
			<div class="space"></div><div class="space"></div> 
                        <table class="centered bordered">
			<thead>
				<tr>
					<th>Name </th>
					<th>Data </th>
				</tr>
			</thead>
                        <?php
                                while($data=mysql_fetch_array($result)){
                                        echo "<tr><td>";
                                        $id=$data['id'];
                                        echo($id."</td><td>");
                                        $msg=$data['msg'];
                                        echo($msg."</td></tr>");
                                }
                                mysql_close($connect);  
                      ?>
                        </table>
                </div>

		<footer class="page-footer">
			<div class="footer-copyright">
				<div class="container">
					© 2017 Copyright Young
					<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
	</body>
</html>
