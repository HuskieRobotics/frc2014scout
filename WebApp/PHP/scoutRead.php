<?php

include 'GLOBAL.php';
$conn = mysql_connect("localhost", $databaseUser);
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
//echo "Connection successful.<br/>";

$database = "yes";
$table = "test";
$field1 = "teamNum";
$field2 = "matchNum";
$field3 = "highScoreA";


mysql_select_db($databaseID);
$sql = "SELECT $field1, $field2, $field3 FROM $table";
$return = mysql_query($sql, $conn);
if (!$return) {
    die("Could not get data: " . mysql_error());
}
//echo "Data retrieval successful.<br/>";

echo <<<_END
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>3061 Scouting - Data</title>
        <link rel='stylesheet' type='text/css' href='stylesheet.css'/>


    <script type="text/javascript" src="script.js"></script>

    </head>
    <body>
        <div id="container">
        <div id="header"><h1>3061 Scouting</h1>
        <br/>
        </div>
        
        </div>
        <div id="content"><h1>Data</h1>

_END;
while ($row = mysql_fetch_assoc($return)) {
    echo "$field1" . ": " . "{$row[$field1]} <br/>";
    echo "$field2" . ": " . "{$row[$field2]} <br/>";
    echo "$field3" . ": " . "{$row[$field3]} <br/>";
    

    echo "<br/><br/>";
}
echo <<<_END
        </div>
        <br class="clearFloat" />
        <div id="footer"><p>&copy; Yasha Mostofi 2013</p></div>
        </div>
    </body>
</html>
_END;
mysql_close($conn);
?>