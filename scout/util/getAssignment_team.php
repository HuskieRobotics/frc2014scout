<?php
include 'GLOBAL.php';

if (isset($_POST['MATCH_NUM']))
{
	$MATCH_NUM = $_POST['MATCH_NUM'];
}
if (isset($_POST['NAME_OF_SCOUT']))
{
	$NAME_OF_SCOUT = $_POST['NAME_OF_SCOUT'];
}

if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
//echo "Connection successful.<br/>";

$database = "yes";
$table = $assignmentTable;

$length = count($assignmentFieldNames);

mysql_select_db($databaseID);

$sql = "SELECT ";


$sql .= " " . implode(", ", $assignmentFieldNames) . " FROM $table";

$return = mysql_query($sql, $conn);
if (!$return) {
    die("Could not get data: " . mysql_error());
}
//echo "Data retrieval successful.<br/>";

$teamToScout = '';

while ($row = mysql_fetch_assoc($return)) {
    for ($i = 0; $i < $length; $i++) {
        $fieldName = $assignmentFieldNames[$i];
        
        if ($fieldName == 'matchNum')
        {
        	if ($MATCH_NUM == $row[$fieldName])
        	{
        		$currConCount = $row['matchConCount'];
        		$conCountMOD = $currConCount % 6;
        		switch ($conCountMOD)
				{
        			case 0:
        				$teamToScout = $row['team1'];
        				break;
        			case 1:
        				$teamToScout = $row['team2'];
        				break;
        			case 2:
        				$teamToScout = $row['team3'];
        				break;
        			case 3:
        				$teamToScout = $row['team4'];
        				break;
        			case 4:
        				$teamToScout = $row['team5'];
        				break;
        			case 5:
        				$teamToScout = $row['team6'];
        				break;
        		}
        		
        	}

        }
    }
}

while ($row = mysql_fetch_assoc($return)) {
    if ($MATCH_NUM == $row['matchNum'])
    {
        for ($i = 1; $i <=6; i++)
        {
            if ($row['team' + $i + '_assign'] == $NAME_OF_SCOUT)
            {
                $teamToScout = $row['team' + $i]; 
            }
        }

        for ($i = 1; $i <= 6; $i++)
        {
            if ($row['team' + $i + '_assign'] == '')
            {
                $teamToScout = $row['team' + $i];
                $sql3 = "UPDATE $table ";
                $sql3 .= "SET team" + "$i" + "_assign=$NAME_OF_SCOUT ";
                $sql3 .= "WHERE matchNum=$MATCH_NUM;";
                $return3 = mysql_query($sql3, $conn);
                if (!$return)
                {
                    die("Failed " . mysql_error());
                }
            }
        }
    }
}

$newConCount = $currConCount+1;
$sql2 = "UPDATE $table ";
$sql2 .= "SET matchConCount=$newConCount ";
$sql2 .= "WHERE matchNum=$MATCH_NUM;";
$return2 = mysql_query($sql2, $conn);
if (!$return) {
	die("Could not get data: " . mysql_error());
}

echo $teamToScout;

mysql_close($conn);
?>
