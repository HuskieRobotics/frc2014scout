<?php

include 'GLOBAL.php';
$conn = mysql_connect("localhost", $databaseUser);
if (!$conn) {
    die("Could not connect: " . mysql_error());
}
//echo "Connection successful.<br/>";

$database = "yes";
$table = "test";

$length = count($fieldNames);

mysql_select_db($databaseID);

$sql = "SELECT ";


$sql .= " (`" . implode("`, `", $fieldNames) . "`) FROM $table";

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
    for ($i = 0; $i < $length; $i++) {
        $fieldName = $fieldNames[$i];
        
        echo "$fieldName" . ": " . "{$row[$fieldName]} <br/>";
    }

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