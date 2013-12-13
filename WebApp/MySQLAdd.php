<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Add Table</title>
    </head>
    <body>
        <?php
            include 'GLOBAL.php';
            $conn = mysql_connect("localhost", $databaseUser, $databasePassword);
            if (!$conn)
            {
                die("Could not connect: " . mysql_error());
            }
            echo "Connection successful.<br/>";
            
            $database = "";
            $table = "";
            $field1 = "";
            $field2 = "";
            $field3 = "";
            foreach ($_POST as $key=>$value)
            {
                switch($key)
                {
                    case "database":
                        $database = $value;
                        break;
                    case "table":
                        $table = $value;
                        break;
                    case "field1":
                        $field1 = $value;
                        break;
                    case "field2":
                        $field2 = $value;
                        break;
                    case "field3":
                        $field3 = $value;
                        break;
                }
            }
            
            mysql_select_db($database);
            
            $sql = "CREATE TABLE $table( " .
                    "$field1 VARCHAR(100) NOT NULL, " .
                    "$field2 VARCHAR(100) NOT NULL, " .
                    "$field3 VARCHAR(100) NOT NULL); ";
            $return = mysql_query($sql, $conn);
            if (!$return)
            {
                die("Could not add table: " . mysql_error());
            }
            echo "Table addition successful.";
            mysql_close($conn);
        ?>
    </body>
</html>
