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
		Match Remover
		</h1>
		<br/>
		
		<a href="frcScoutbeta.php">Main Page</a>
		<a href="compedit.php">Competition Editor</a>
		<a href="graphViewer.php">Graph Viewer</a>
		<a href="teamData.php">Team Data Viewer</a>
		<a href="matchRem.php">Match Remover</a>
		Welcome, <?php session_start(); echo$_SESSION['user']; ?>. Last match entered: <?php echo $_SESSION['lastm']; ?>.<br/>
		<br/>
		
		<form method=post action="matchRem.php">
		<select name="comp">
		<option value="">All</option>
		<?php
				include 'themvars.php';
				$connect=mysql_connect($server,$username,$password); 
		
				mysql_select_db($database) or die( "Unable to open database");
				$tourns=mysql_query("Select * from Tournament;",$connect);
				if (!$tourns) 
				{
					die('Invalid query: ' . mysql_error());
				}
				while($row = mysql_fetch_array($tourns)) 
				{ 
					echo '	<option value="'.$row['tname'].'">'.$row['tname'].'</option>
					'; 
				}
				?>
		</select>
		<input type="submit" value="Filter"/>
		</form>
		
		<form method=post action="matchRemove.php">
		<center>
		<table>
		<?php
		genRemoveMTable($_POST['comp']);
		?>
		</table>
		<input type="submit" value="Remove Selected"/>
		</center>
		</form>
		<br/>
		<a href="admin.php">Admin</a>
		
	</body>
</html>