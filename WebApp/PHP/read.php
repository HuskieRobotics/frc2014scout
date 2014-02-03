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
$field4 = "medScoreA";
$field5 = "lowScoreA";
$field6 = "highScoreT";
$field7 = "medScoreT";
$field8 = "lowScoreT";

mysql_select_db($databaseID);
$sql = "SELECT $field1, $field2, $field3, $field4,"
        . "$field5, $field6, $field7, $field8 FROM $table";
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
        <nav>
                <ul class="top-menu">
                    <li><a href="index.php">enter</a><div class="menu-item" id="enter"></div></li>
                    <li><a href="read.php">read</a><div class="menu-item" id="read"></div></li>
                </ul>
        </nav>
        </div>
        
        </div>
        <div id="content"><h1>Data</h1>

_END;
while ($row = mysql_fetch_assoc($return)) {
    echo "$field1" . ": " . "{$row[$field1]} <br/>";
    echo "$field2" . ": " . "{$row[$field2]} <br/>";
    echo "$field3" . ": " . "{$row[$field3]} <br/>";
    echo "$field4" . ": " . "{$row[$field4]} <br/>";
    echo "$field5" . ": " . "{$row[$field5]} <br/>";
    echo "$field6" . ": " . "{$row[$field6]} <br/>";
    echo "$field7" . ": " . "{$row[$field7]} <br/>";
    echo "$field8" . ": " . "{$row[$field8]} <br/>";

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