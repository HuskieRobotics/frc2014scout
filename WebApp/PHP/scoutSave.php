<?php

include 'GLOBAL.php';
$conn = mysql_connect("localhost", $databaseUser);
if (!$conn) {
    die("Could not connect: " . mysql_error());
}

$database = "yes";
$table = "test";
$field1 = "teamNum";
$field2 = "matchNum";
$field3 = "highScoreA";

$teamnum = $_POST['teamnum'];
$matchnum = $_POST['matchnum'];
$highLabelA = $_POST['highLabelA'];
$teamworkRating = $_POST['teamworkRating'];

mysql_select_db($databaseID);
$sql = "INSERT INTO $table " .
"($field1, $field2, $field3) " .
"VALUES " .
"($teamnum,$matchnum,$highLabelA) ";
$return = mysql_query($sql, $conn);
if (!$return) {
die("Could not insert data: " . mysql_error());
}
echo "Data insertion successful.";

mysql_close($conn);

echo "<p>Connection successful.</p>";

?>