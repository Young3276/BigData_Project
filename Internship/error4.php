<!DOCTYPE html>
<html>
	<head>
		<title> ERROR PAGE </title>
		<meta http-equiv="Content-Type" content="text.html; charset=UTF-8"/>
		<!-- CSS-->
		<link rel="stylesheet" type="text/css" href="./materialize/css/materialize.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<!-- SCRIPT-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="./materialize/js/materialize.js"></script>
	</head>
	<body>
		<div class="row">
			<div class="valign-wrapper">
				<p class="center-align"><img src="./materialize/img/error404.png"/></p>
			</div>	
		</div>	
		<script>
			$(document).ready(function(){
				setTimeout(function(){
					window.location="./index.php";
				},2000);
				alert("Mainpage로 이동합니다");
			});
		</script>
	</body>
</html>
