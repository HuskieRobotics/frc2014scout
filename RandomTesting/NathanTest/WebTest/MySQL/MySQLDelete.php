<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Delete Database</title>
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
            $sql = "DROP DATABASE $database";
            $return = mysql_query($sql, $conn);
            if (!$return)
            {
                die("Could not delete database: " . mysql_error());
            }
            echo "Database deletion successful.";
            mysql_close($conn);
        ?>
    </body>
</html>