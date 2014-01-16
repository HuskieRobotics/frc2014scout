<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
require_once('stats.php');
session_start(); ?>
<html>
	<head>
		<style type="text/css">
		body
		{
			background-color:#f0f2f2;
		}
		h1
		{
			color:#262526;
			text-align:center;
		}
		table, th, td
		{
			background-color:#f2e0bd;
			text-align:center;
			border-collapse:collapse;
			border: 1px solid black;
			color:#262526;
		}
		input, select
		{
			background-color:#f0f2f2;
			color:#262526;
		}
		a:link {color:#f29422;}
		a:visited {color:#f28322;}
		a:hover {color:#f29422;}
		a:active {color:#f28322;}
		</style>
		<title>FRC Scouting System</title>
	</head>
	<body>
		
		<h1>
		<center>
		Admin
		</center>
		</h1>
		<br/>
		<a href="frcScoutbeta.php">Main Page</a>
		<a href="compedit.php">Competition Editor</a>
		<a href="graphViewer.php">Graph Viewer</a>
		<a href="teamData.php">Team Data Viewer</a>
		<a href="matchRem.php">Match Remover</a>
		Welcome, <?php echo$_SESSION['user']; ?>. Last match entered: <?php echo $_SESSION['lastm']; ?>.<br/><br/>
		<a href="javascript:reset()">Reset database</a><br/>
		<a href="javascript:create()">Create database</a><br/><br/>
		<script type="text/javascript">
		function reset() {
			var answer = confirm("Reset database?")
			if (answer){
				alert("Database reset.")
				window.location = "admin.php?act=reset";
			}
			else{
				alert("No action taken.")
			}
		}
		function create() {
			var answer = confirm("Create database?")
			if (answer){
				alert("Database created.")
				window.location = "admin.php?act=create";
			}
			else{
				alert("No action taken.")
			}
		}
		</script>
		<?php
		if(strcmp($_GET['act'],'reset')==0)
		{
			$sql="TRUNCATE Alliance;";
			queryThis($sql);
			$sql="TRUNCATE brokeWith;";
			queryThis($sql);
			$sql="TRUNCATE defensiveWith;";
			queryThis($sql);
			$sql="TRUNCATE happenedAt;";
			queryThis($sql);
			$sql="TRUNCATE isAt;";
			queryThis($sql);
			$sql="TRUNCATE Score;";
			queryThis($sql);
			$sql="TRUNCATE Team;";
			queryThis($sql);
			$sql="TRUNCATE tMatch;";
			queryThis($sql);
		}
		else if(strcmp($_GET['act'],'create')==0)
		{
			//TODO: create databases
		}
		?>
	</body>
</html>
