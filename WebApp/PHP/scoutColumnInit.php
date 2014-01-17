
<?php

echo <<<_END
<html>
<head>
    <title>Creating columns...</title>
</head>
<body>
<form method="post" action="scoutCreateDatabase.php">
           name of database?: 
        <input type="text" name="databaseName" />
        <input type="submit" />
</form>
</body>
</html>
_END;
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