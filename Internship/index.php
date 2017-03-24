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
		<?php include 'navbar.php' ?>
		<center><h2> Young's Assignment </h2></center>
		<div class="space"></div>
		<div class="space"></div>
		<div class="row">
			<div class="col s3">
				<div class="row">
					<div class="col s3 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP01</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal1">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP02</span>
							</div>
							<div class="card-action">
								<a class="waves-effect waves-light btn" href="#modal2">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP03</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal3">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP04</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal4">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP05</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal5">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP06</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal6">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP07</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal7">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s3">
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1">
							<div class="card-content white-text">
								<span class="card-title">STEP08</span>
							</div>
							<div class="card-action">
								  <a class="waves-effect waves-light btn" href="#modal8">Click</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php' ?>
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
