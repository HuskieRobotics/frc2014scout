<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Insert Data Record</title>
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
            
            $database = $_POST["database"];
            $table = $_POST["table"];
            $field1 = $_POST["field1"];
            $field2 = $_POST["field2"];
            $field3 = $_POST["field3"];
            $value1 = $_POST["value1"];
            $value2 = $_POST["value2"];
            $value3 = $_POST["value3"];
            
            mysql_select_db($database);
            $sql = "INSERT INTO $table " . 
                    "($field1,$field2,$field3) " .
                    "VALUES " .
                    "('$value1','$value2','$value3')";
            
            $return = mysql_query($sql, $conn);
            if (!$return)
            {
                die("Could not insert data: " . mysql_error());
            }
            echo "Data insertion successful.";
            mysql_close($conn);
        ?>
    </body>
</html>
