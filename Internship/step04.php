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
		<center><h2> Young's Assignment </h2></center>
                <table id="myTable" class="display" cellspacing="0" width="100%"></table>
		<?php include 'footer.php'?>
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
