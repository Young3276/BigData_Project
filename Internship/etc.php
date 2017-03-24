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
		<?php include 'navbar.php'?>
		<center>
			<h2> Young's Assignment </h2>
			<h4> Wait a minute..... </h4>
			<div id="chart_div" style="inline-block"></div>
		</center>

		<?php include 'footer.php'?>
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
