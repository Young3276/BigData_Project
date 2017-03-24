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
		<center><h2> Young's Assignment </h2></center>
                <table id="myTable" class="display" cellspacing="0" width="100%"></table>
		<footer class="page-footer">
			<div class="footer-copyright">
				<div class="container">
					© 2017 Copyright Young
					<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
                <script type="text/javascript">
                $(document).ready(function(){
			$(".button-collapse").sideNav();
                        $("#myTable").DataTable({
                                "ajax":"main.php",
                                "columns":[
                                        {"title":"Country", "data":"country"},
                                        {"title":"Code", "data":"code"},
                                        {"title":"JAN", "data":"jan"},
                                        {"title":"FEB", "data":"feb"},
                                        {"title":"MAR", "data":"mar"},
                                        {"title":"APR", "data":"apr"},
                                        {"title":"MAY", "data":"may"},
                                        {"title":"JUN", "data":"jun"}
                                ]
                        });
                });
                </script>
	</body>
</html>
