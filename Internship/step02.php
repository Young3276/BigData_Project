<?php
        header("Content-Type:text/html; charset=UTF-8");
        $host="10.110.239.148:8888";
        $user="dyoung";
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
		<nav class="nav-extended">
			<div class="nav-wrapper">
				<a href="./index.php" class="brand-logo">NBP INTERNSHIP</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="./step02.php">STEP02</a></li>
					<li><a href="./step04.php">STEP04</a></li>
					<li><a href="./step08.php">STEP08</a></li>
					<li><a href="./etc.php">ETC</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="./step02.php">STEP02</a></li>
					<li><a href="./step04.php">STEP04</a></li>
					<li><a href="./step08.php">STEP08</a></li>
					<li><a href="./etc.php">ETC</a></li>
				</ul>
			</div>
		</nav>
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
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>STEP 01</h4>
				<p> Submit your hostname and installed package </p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
	<div id="modal2" class="modal">
			<div class="modal-content">
				<h4>STEP 02</h4>
				<p> 1) Submit your URL and DIR path</p>
				<p> 2) Submit WebServer, DBServer, development package list</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal3" class="modal">
			<div class="modal-content">
				<h4>STEP 03</h4>
				<p> 1) Submit Data SET name and DB Connection Information </p>
				<p> 2) Submit how to using DATA loading </p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal4" class="modal">
			<div class="modal-content">
				<h4>STEP 04</h4>
				<p> 1) Submit Webserver DIR path </p>
				<p> 2) Submit Javascript package name </p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal5" class="modal">
			<div class="modal-content">
				<h4>STEP 05</h4>
				<p> Submit git repository name</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal6" class="modal">
			<div class="modal-content">
				<h4>STEP 06</h4>
				<p> Submit VM Host name and VIP </p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal7" class="modal">
			<div class="modal-content">
				<h4>STEP 07</h4>
				<p> Submit git repository name checked in script file </p>
				<p> bulid.sh / test.sh / deploy.sh</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<div id="modal8" class="modal">
			<div class="modal-content">
				<h4>STEP 08</h4>
				<p> Submit used javascript pakage name and URL </p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$(".button-collapse").sideNav();
				$(".modal").modal();
			});

		</script>
	</body>
</html>
