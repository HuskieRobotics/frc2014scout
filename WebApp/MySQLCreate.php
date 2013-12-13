<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Create Database</title>
    </head>
    <body>
        <?php
        	include 'GLOBAL.php';
            $conn = mysql_connect("localhost",$databaseUser, $databasePassword);
            if (!$conn)
            {
                die("Could not connect: " . mysql_error());
            }
            echo "Connection successful.<br/>";
            $database = "";
            foreach ($_POST as $value)
            {
                $database = $value;
            }
            $sql = "CREATE DATABASE $database";
            $return = mysql_query($sql, $conn);
            if (!$return)
            {
                die("Could not create database: " . mysql_error());
            }
            echo "Database creation successful.";
            mysql_close($conn);
        ?>
    </body>
</html>