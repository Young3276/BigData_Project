<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="./materialize/css/dataTables.jqueryui.css"/>
		<link rel="stylesheet" type="text/css" href="./materialize/css/materialize.css"/>
		<link rel="stylesheet" type="text/css" href="./materialize/css/mystyle.css"/>
		<link rel="stylesheet" href="./materialize/css/d3.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<!-- js-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="./materialize/js/d3.v3.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="./materialize/js/materialize.js"></script>
		<script type="text/javascript" src="./materialize/js/jquery.dataTables.js"></script>
		
	</head>
	<body>
		<?php include 'navbar.php'?>
		<center>
			<h2> Young's Assignment </h2>
			<h4> Column Gragh By D3.js</h4>
			<h6> 6개월간 각 국의 환율변동 평균</h6>
			<svg id="myGraph"></svg>
		</center>
	
		<?php include 'footer.php'?>
                <script type="text/javascript">
	                $(document).ready(function(){
				$(".button-collapse").sideNav();
	                });
			var svgWidth=1000;
			var svgHeight=440;
			var offsetX=17;
			var offsetY=40;
			var minSet=10;
			var barElements;
			var barWidth=35;
			var barMargin=10;

			d3.json('chart.php', function(error, data){
				var dataSet=[];
				var nameSet=[];
				for(var i=0; i<data.length; i++){
					nameSet.push(data[i].country);
					dataSet.push(data[i].avg);
				}
				barElements=d3.select("#myGraph").selectAll("rect").data(dataSet)
				// Draw Bar
				barElements.enter().append("rect").attr("class","bar").attr("height",0).attr("width",barWidth)
						.attr("x",function(d,i){ return i*(barWidth+barMargin)+offsetX;})
						.attr("y",svgHeight)
						.on("mouseover", function(){ d3.select(this).style("fill","red")})
						.on("mouseout", function(){ d3.select(this).style("fill","orange")})
						.transition().duration(1000).delay(function(d,i){ return i*100;})
						.attr("y", function(d,i){ return svgHeight-parseInt(svgHeight/4500*dataSet[i])-offsetY+minSet/2;})
						.attr("height", function(d, i){return svgHeight/4500*dataSet[i];})
				// Draw Country Name
				barElements.enter().append("text").attr("class","barNum")
						.attr("x",function(d,i){return i*(barWidth+barMargin)+offsetX*2;})
						.attr("y",svgHeight-minSet*2).text(function(d,i){return nameSet[i];})
				//Draw value
				barElements.enter().append("text").attr("class", "barName")
						.attr("x",function(d,i){return i*(barWidth+barMargin)+offsetX*2;})
						.attr("y",function(d,i){return svgHeight-parseInt(svgHeight/4500*dataSet[i])-offsetY;}).text(function(d,i){return dataSet[i];})
			})
                </script>
	</body>
</html>
