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
		img
		{
			display:block;
			margin-left:auto;
			margin-right:auto;
		}
		</style>
		<title>FRC Scouting System</title>
	</head>
	<body>
		<?php
		function using_ie()
		{
			$u_agent = $_SERVER['HTTP_USER_AGENT'];
			$ub = False;
			if(preg_match('/MSIE/i',$u_agent))
			{
				$ub = True;
			}
		   
			return $ub;
		}

		function ie_box() {
			if (using_ie()) {
				?>
				<div class="iebox">
					This page is not designed for Intenet Explorer.  If you want to see this webpage as intended, please use a standards compliant browser, such as <a href="http://www.google.com/chrome">Google Chrome</a> or <a href="http://www.mozilla.com/en-US/firefox/fx/">Firefox</a>.
				</div>
				<?php
			return;
			}
		}
		ie_box();
		?>
		<h1>
		<center>
		Graph Viewer
		</center>
		</h1>
		<br/>
		<a href="frcScoutbeta.php">Main Page</a>
		<a href="compedit.php">Competition Editor</a>
		<a href="graphViewer.php">Graph Viewer</a>
		<a href="teamData.php">Team Data Viewer</a>
		<a href="matchRem.php">Match Remover</a>
		Welcome, <?php session_start(); echo$_SESSION['user']; ?>. Last match entered: <?php echo $_SESSION['lastm']; ?>.<br/>
		<form method=post action="graphViewer.php">
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
		</form><form method=post action="recalc.php"><input type="submit" value="Recalculate all data"/></form>
		<center>Click for larger graph</center>
		<a href="avgGbig.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"><img src="avgG.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"/><br/></a>
		<a href="reliabilityGbig.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"><img src="reliabilityG.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"/><br/></a>
		<a href="offenseGbig.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"><img src="offenseG.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"/><br/></a>
		<a href="defenseGbig.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"><img src="defenseG.php?comp=<?php echo str_replace(' ','+',$_POST['comp']); ?>"/><br/></a>
		Graphs from <a href="http://www.ebrueggeman.com/phpgraphlib/">PHPGraphLib</a>
		
	</body>
</html>
