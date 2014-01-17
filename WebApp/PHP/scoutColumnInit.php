<?php
include 'GLOBAL.php';
if ($usePassword) {
    $conn = mysql_connect("localhost", $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect("localhost", $databaseUser);
}
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
echo "Connection successful.<br/>";
$database = "";
if (isset($_POST["databaseName"]))
{
    $database = $_POST["databaseName"];
    $sql = "CREATE DATABASE $database";
    $return = mysql_query($sql, $conn);
    if (!$return) {
        die("Could not create database: " . mysql_error());
    }
    echo "Database creation successful.";
}
mysql_close($conn);
?>