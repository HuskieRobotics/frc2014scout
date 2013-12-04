<?php
require_once('globals.php');
$username=$GLOBALS['username'];
$password=$GLOBALS['password'];
$database=$GLOBALS['database'];
$server=$GLOBALS['server'];

function newTournament($tName,$loc,$year,$mo,$day)
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database");
	
	$myString='INSERT IGNORE INTO Tournament VALUES(\''.mysql_real_escape_string($tName,$connect).'\',\''.mysql_real_escape_string($loc,$connect).'\',\''.mysql_real_escape_string($year,$connect).mysql_real_escape_string($mo,$connect).mysql_real_escape_string($day,$connect).'\')';//dcfe700ace79a58e7b71975b3b97d58e
	$result = mysql_query($myString);
	if (!$result) 
	{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $myString . 'Press back!';
		die($message);
	}
	
	mysql_close();
}
function remTournament($tName)
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database");
	
	$myString='DELETE FROM Tournament WHERE tname=\''.mysql_real_escape_string($tName,$connect).'\'';
	$result = mysql_query($Clean);
	if (!$result) 
	{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $Clean . 'Press back!';
		die($message);
	}
	
	mysql_close();
}

function genRemoveTable()
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database: $database on server $server");
	$result=mysql_query("Select * from Tournament;",$connect);
	if (!$result) 
	{
		die('Invalid query: ' . mysql_error());
	}
	while($row = mysql_fetch_array($result)) 
    { 
		echo '<tr>'; 
		echo '<td><input type="checkbox" name="'.$row['tname'].'"/></td>';
		echo '<td>' . $row['tname'] . '</td>'; 
		echo '<td>' . $row['loc'] . '</td>'; 
		echo '<td>' . $row['dat'] . '</td>'; 
		echo '</tr>
		'; 
    } 
	mysql_close();
}

function genRemoveMTable($tname)
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database: $database on server $server");
	if(strcmp($tname,"")==0)
	{
		$result=mysql_query("Select * from happenedAt;",$connect);
	}
	else
	{
		$result=mysql_query("Select * from happenedAt H WHERE H.tname='".$tname."';",$connect);
	}
	if (!$result) 
	{
		die('Invalid query: ' . mysql_error());
	}
	while($row = mysql_fetch_array($result)) 
    { 
		echo '<tr>'; 
		echo '<td><input type="checkbox" name="'.$row['mid'].'"/></td>';
		echo '<td>' . $row['mid'] . '</td>'; 
		echo '<td>' . $row['tname'] . '</td>'; 
		echo '</tr>
		'; 
    } 
	mysql_close();
}

require_once('stats.php');

function genTeamTable($teamno)
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database: $database on server $server");
	$sql = "SELECT T.teamno,T.reliability,T.offense,T.defense,S.raw,S.penalty,S.final \n"
    . "FROM Team T, Score S \n"
    . "WHERE T.asid=S.sid \n"
    . "AND T.teamno='".$teamno."'";
	$result=queryThis($sql);
	$yes=0;
	while($row = mysql_fetch_array($result)) 
    { 
		$yes=1;
		echo "<tr>
		<td><b><a href=http://www.thebluealliance.com/team/".$row['teamno'].">".$row['teamno']."</a></b>
		</td>
		</tr>
		<tr>
		<td>
		They have worked in %".(100*floatval($row['reliability']))." of their matches.
		</td>
		<tr>
		<td>
		They score %".(100*floatval($row['offense']))." higher than their opponents (negative means lower).
		</td>
		</tr>
		<tr>
		<td>
		They score %".(100*floatval($row['defense']))." higher than their opponents when they play defensively <br/>(negative means lower, 0 might mean they have never been on defense).
		</td>
		</tr>
		<tr>
		<td>
		They score an average of ".(floatval($row['final']))." points. ".(floatval($row['raw']))." before penalites, ".(floatval($row['penalties']))." in penalties.
		</td>
		</tr>
		</tr>
		"; 
    } 
	if($yes==0)
	{
		echo 'Team not found.';
	}
	mysql_close();
}

?>