<?php
include 'GLOBAL.php';
echo "SETTING UP SQL...";
echo '\n';
echo "Team Fields :";

echo "adding columns...";
if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
echo "Connection successful.<br/>";
mysql_select_db($databaseID);
$stop = count($teamFieldNames);

$sql = "CREATE TABLE $teamTable( ";
for ($i = 0; $i < $stop; $i++)
{
    if ($i < ($stop-1))
    {
        $sql .= $teamFieldNames[$i] . " " . $teamFieldNameTypes[$i] . " NOT NULL, ";
    }
    else
    {
        $sql .= $teamFieldNames[$i] . " " . $teamFieldNameTypes[$i] . " NOT NULL);";
    }
}

$return = mysql_query($sql, $conn);
if (!$return)
{
    die("Could not add table: " . mysql_error());
}
echo "Table addition successful.";
mysql_close($conn);


echo "Assignment Fields :";

echo "adding columns...";
if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
echo "Connection successful.<br/>";
mysql_select_db($databaseID);
$stop = count($assignmentFieldNames);

$sql = "CREATE TABLE $assignmentTable( ";
for ($i = 0; $i < $stop; $i++)
{
    if ($i < ($stop-1))
    {
        $sql .= $assignmentFieldNames[$i] . " " . $assignmentFieldNameTypes[$i] . " NOT NULL, ";
    }
    else
    {
        $sql .= $assignmentFieldNames[$i] . " " . $assignmentFieldNameTypes[$i] . " NOT NULL);";
    }
}

$return = mysql_query($sql, $conn);
if (!$return)
{
    die("Could not add table: " . mysql_error());
}
echo "Table addition successful.";
mysql_close($conn);

echo "Alliance Fields :";

echo "adding columns...";
if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
echo "Connection successful.<br/>";
mysql_select_db($databaseID);
$stop = count($allianceFieldNames);

$sql = "CREATE TABLE $allianceTable( ";
for ($i = 0; $i < $stop; $i++)
{
    if ($i < ($stop-1))
    {
        $sql .= $allianceFieldNames[$i] . " " . $allianceFieldNameTypes[$i] . " NOT NULL, ";
    }
    else
    {
        $sql .= $allianceFieldNames[$i] . " " . $allianceFieldNameTypes[$i] . " NOT NULL);";
    }
}

$return = mysql_query($sql, $conn);
if (!$return)
{
    die("Could not add table: " . mysql_error());
}
echo "Table addition successful.";
mysql_close($conn);


echo "Pit Fields :";

echo "adding columns...";
if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
echo "Connection successful.<br/>";
mysql_select_db($databaseID);
$stop = count($pitFieldNames);

$sql = "CREATE TABLE $pitTable( ";
for ($i = 0; $i < $stop; $i++)
{
    if ($i < ($stop-1))
    {
        $sql .= $pitFieldNames[$i] . " " . $pitFieldNameTypes[$i] . " NOT NULL, ";
    }
    else
    {
        $sql .= $pitFieldNames[$i] . " " . $pitFieldNameTypes[$i] . " NOT NULL);";
    }
}

$return = mysql_query($sql, $conn);
if (!$return)
{
    die("Could not add table: " . mysql_error());
}
echo "Table addition successful.";
mysql_close($conn);