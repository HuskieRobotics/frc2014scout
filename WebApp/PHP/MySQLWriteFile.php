<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Write to File</title>
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
            
            mysql_select_db($database);
            $sql = "SELECT $field1, $field2, $field3 FROM $table";
            $return = mysql_query($sql, $conn);
            if (!$return)
            {
                die("Could not get data: " . mysql_error());
            }
            echo "Data retrieval successful.";
            
            $file = fopen("C:\\xampp\\htdocs\\WebTest\\MySQLTest.html", "w");
            if (!$file)
            {
                die("Could not open file.");
            }
            fwrite($file, "<!DOCTYPE html>\r\n");
            fwrite($file, "<html>\r\n");
            fwrite($file, "<head>\r\n<title>MySQL Test</title>\r\n</head>\r\n");
            fwrite($file, "<body>\r\n");
            while ($row = mysql_fetch_assoc($return))
            {
                fwrite($file, "<p>$field1" . ": " . "{$row[$field1]}</p>" . "\r\n");
                fwrite($file, "<p>$field2" . ": " . "{$row[$field2]}</p>" . "\r\n");
                fwrite($file, "<p>$field3" . ": " . "{$row[$field3]}</p>" . "\r\n");
            }
            fwrite($file, "</body>\r\n");
            fwrite($file, "</html>\r\n");
            
            fclose($file);
            mysql_close($conn);
            
            echo "<br/>";
            echo "<a href=\"MySQLTest.html\">File</a>";
            
            exit();
        ?>
    </body>
</html>
