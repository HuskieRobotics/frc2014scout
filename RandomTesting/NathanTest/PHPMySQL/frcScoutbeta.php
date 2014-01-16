<?php session_start(); ?>
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
		<?php
		if(isset($_SESSION['user']))
		{
		?>
		<h1>
		<center>
		FRC Scouting System
		</center>
		</h1>
		<br/>
		
		<a href="frcScoutbeta.php">Main Page</a>
		<a href="compedit.php">Competition Editor</a>
		<a href="graphViewer.php">Graph Viewer</a>
		<a href="teamData.php">Team Data Viewer</a>
		<a href="matchRem.php">Match Remover</a>
		Welcome, <?php echo$_SESSION['user']; ?>. Last match entered: <?php echo $_SESSION['lastm']; ?>.<br/>
		<center>
		<table>
		<form method=post action="submit.php">
			<tr>
				<th colspan="6">Blue Alliance</th>
				<th></th>
				<th colspan="6">Red Alliance</th>
			</tr>
			<tr>
				<td> </td>
				<td>Team Number</td>
				<td>Defensive</td>
				<td>Broken</td>
				<td> </td>
				<td>Score</td>
				<td> </td>
				<td> </td>
				<td>Team Number</td>
				<td>Defensive</td>
				<td>Broken</td>
				<td> </td>
				<td>Score</td>
			</tr>
			<tr>
				<td>Team 1</td>
				<td><input type="text" name="teamno1B" tabindex="2"/></td>
				<td><input type="checkbox" name="defense1B"/></td>
				<td><input type="checkbox" name="broken1B"/></td>
				<td>Raw</td>
				<td><input type="text" name="rawB" tabindex="8"/></td>
				<td></td>
				<td>Team 1</td>
				<td><input type="text" name="teamno1R" tabindex="5"/></td>
				<td><input type="checkbox" name="defense1R"/></td>
				<td><input type="checkbox" name="broken1R"/></td>
				<td>Raw</td>
				<td><input type="text" name="rawR" tabindex="11"/></td>
			</tr>
			<tr>
				<td>Team 2</td>
				<td><input type="text" name="teamno2B" tabindex="3"/></td>
				<td><input type="checkbox" name="defense2B"/></td>
				<td><input type="checkbox" name="broken2B"/></td>
				<td>Penalty</td>
				<td><input type="text" name="penaltyB" tabindex="9"/></td>
				<td></td>
				<td>Team 2</td>
				<td><input type="text" name="teamno2R" tabindex="6"/></td>
				<td><input type="checkbox" name="defense2R"/></td>
				<td><input type="checkbox" name="broken2R"/></td>
				<td>Penalty</td>
				<td><input type="text" name="penaltyR" tabindex="12"/></td>
			</tr>
			<tr>
				<td>Team 3</td>
				<td><input type="text" name="teamno3B" tabindex="4"/></td>
				<td><input type="checkbox" name="defense3B"/></td>
				<td><input type="checkbox" name="broken3B"/></td>
				<td>Final</td>
				<td><input type="text" name="finalB" tabindex="10"/></td>
				<td></td>
				<td>Team 3</td>
				<td><input type="text" name="teamno3R" tabindex="7"/></td>
				<td><input type="checkbox" name="defense3R"/></td>
				<td><input type="checkbox" name="broken3R"/></td>
				<td>Final</td>
				<td><input type="text" name="finalR" tabindex="13"/></td>
			</tr>
			<tr>
				<td>Competition</td>
				<td colspan="5"><select name="tournament">
				<option value="<?php echo $_SESSION['lastt']; ?>"><?php echo $_SESSION['lastt']; ?></option>
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
					'; //dcfe700ace79a58e7b71975b3b97d58e
				}
				?>
				</select></td>
				<td></td>
				<td>Match</td>
				<td colspan="5"><select name="session">
					<option value="Q">Q</option>
					<option value="QF">QF</option>
					<option value="SF">SF</option>
					<option value="F">F</option>
				</select>
				<input type="text" name="matchno" tabindex="1" value="<?php echo $_SESSION['nextno']; ?>"/></td>
			</tr>
			<tr>
				<td colspan="13"><input type="submit" value="Submit"/></td>
			</tr>
		</form>
		</table>
		</center>
		
	</body>
</html>
<?php
}
else
{
?>
	<h1>
	<center>
	Welcome new scout!
	</center>
	</h1>
	(Or it has been a long time since I've seen you.)
	<center>
	<table>
	<form method=post action="newScout.php">
	Name: 
	<input type="text" name="name" />
	<input type="submit" value="Submit" />
	</table>
	</center>
	</body>
</html>
<?php
}
?>

