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

$allianceToScout = '';

while ($row = mysql_fetch_assoc($return)) {
    for ($i = 0; $i < $length; $i++) {
        $fieldName = $assignmentFieldNames[$i];
        
        if ($fieldName == 'matchNum')
        {
        	if ($MATCH_NUM == $row[$fieldName])
        	{
        		$currConCount = $row['allianceConCount'];
        		$conCountMOD = $currConCount % 2;
        		if ($conCountMOD == 0)
        		{
        			$allianceToScout = "blue";
        		}
        		else
        		{
        			$allianceToScout = "red";
        		}        		
        	}

        }
    }
}

$newConCount = $currConCount+1;
$sql2 = "UPDATE $table ";
$sql2 .= "SET allianceConCount=$newConCount ";
$sql2 .= "WHERE matchNum=$MATCH_NUM;";
$return2 = mysql_query($sql2, $conn);
if (!$return) {
	die("Could not get data: " . mysql_error());
}

echo $allianceToScout;

mysql_close($conn);
?>
