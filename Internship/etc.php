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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
		<center>
			<h2> Young's Assignment </h2>
			<h4> Wait a minute..... </h4>
			<div id="chart_div" style="inline-block"></div>
		</center>

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
	                });
			google.charts.load('current', {packages:['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart(){
				var jsonData=$.ajax({
					url:'googlechart.php',
					dataType:'json',
					async:false,
					success:function(jsonData){
						var data=new google.visualization.arrayToDataTable(jsonData);
						var view= new google.visualization.DataView(data);
						view.setColumns([0,1,
								{ calc:"stringify",
								  sourceColumn: 1,
								  type:"string",
								  role:"annotation"}
								]);
						var option={
							title:"각 나라별 6개월간 환율평균값",
							width: 1000,
							height: 500,
							bar: {groupWidth: "95%"},
							legend: {position:"none"},
						};
						var chart=new google.visualization.ColumnChart(document.getElementById('chart_div'));
						chart.draw(view, option);
					}
				}).responseText;
			};
                </script>
	</body>
</html>
