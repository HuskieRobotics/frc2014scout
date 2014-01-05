<?php

include 'GLOBAL.php';
$conn = mysql_connect("localhost", $databaseUser);
if (!$conn) {
    die("Could not connect: " . mysql_error());
}

$database = "yes";
$table = "test";

mysql_select_db($databaseID);

$length = count($fieldNames);

for ($i = 0; $i < $length; $i++) {
    
    $fieldName = $fieldNames[$i];
    echo $_POST[$fieldName];
    
    if (isset($_POST[$fieldName]))
        $valueToPut = $_POST[$fieldName];
    else
        $valueToPut = "false"; 
    
    echo $fieldName;
    echo $valueToPut;
    echo "\n";
    
    $sql = "INSERT INTO $table " .
    "($fieldName) " .
    "VALUES " .
    "($valueToPut) ";


    $return = mysql_query($sql, $conn);
    if (!$return) {
        die("Could not insert data: " . mysql_error());
    }
}

echo "Data insertion successful.";

mysql_close($conn);

echo "<p>Connection successful.</p>";
?>