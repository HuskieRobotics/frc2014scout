<?php
echo "adding columns...";
include 'GLOBAL.php';
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
$stop = count($fieldNames);

$sql = "CREATE TABLE $table( ";
for ($i = 0; $i < $stop; $i++)
{
    if ($i < ($stop-1))
    {
        $sql .= $fieldNames[$i] . " " . $fieldNameTypes[$i] . " NOT NULL, ";
    }
    else
    {
        $sql .= $fieldNames[$i] . " " . $fieldNameTypes[$i] . " NOT NULL);";
    }
}

$return = mysql_query($sql, $conn);
if (!$return)
{
    die("Could not add table: " . mysql_error());
}
echo "Table addition successful.";
mysql_close($conn);
?>