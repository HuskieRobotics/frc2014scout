<?php

// scouting app developed by Yasha Mostofi
// for team 3061, Huskie Robotics from Naperville, IL

//Version: .2

//TODO:
// add autonomous scoring
// add miss/score buttons for tele/auto

if (isset($_POST['teamnum']))
    $teamnum = $_POST['teamnum'];
else
    $teamnum = "";

if (isset($_POST['matchnum']))
    $matchnum = $_POST['matchnum'];
else
    $matchnum = "";

if (isset($_POST['highLabel']))
    $highLabel = $_POST['highLabel'];
else
    $highLabel = "";

if (isset($_POST['medLabel']))
    $medLabel = $_POST['medLabel'];
else
    $medLabel = "";

if (isset($_POST['lowLabel']))
    $lowLabel = $_POST['lowLabel'];
else
    $lowLabel = "";

if ($teamnum != "") {
    include 'GLOBAL.php';
    $conn = mysql_connect("localhost", $databaseUser);
    if (!$conn) {
        die("Could not connect: " . mysql_error());
    }

    $database = "scouting";
    $table = "matches";
    $field1 = "teamNum";
    $field2 = "matchNum";
    $field3 = "highScore";
    $field4 = "medScore";
    $field5 = "lowScore";

    mysql_select_db($database);
    $sql = "INSERT INTO $table " .
            "($field1, $field2, $field3, $field4, $field5) " .
            "VALUES " .
            "($teamnum,$matchnum,$highLabel,$medLabel,$lowLabel) ";
    $return = mysql_query($sql, $conn);
    if (!$return) {
        die("Could not insert data: " . mysql_error());
    }
    echo "Data insertion successful.";
    mysql_close($conn);

    echo "Connection successful.<br/>";
}

echo <<<_END
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>development!</title>
        <link rel='stylesheet' type='text/css' href='stylesheet.css'/>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

    </head>
    <body>
        <h1>3061 Scouting</h1>
    <h3>Please enter all data</h3>
	<form action="index.php" method="post" name="form"> 
    	Team # <input type="text" name="teamnum" placeholder="3061" />
        Match # <input type="text" name="matchnum" placeholder="1"/>
    <h3>TELEOP</h3>
        high
    	<button type="button" id="highPlus">+</button>
        <button type="button" id="highMinus">-</button>
        <input type="text" size="5" value="0" id="highLabel" name="highLabel"/>
        <br/>
        medium
        <button type="button" id="medPlus">+</button>
        <button type="button" id="medMinus">-</button>
        <input type="text" size="5" value="0" id="medLabel" name="medLabel"/>
        <br/>
        low
        <button type="button" id="lowPlus">+</button>
        <button type="button" id="lowMinus">-</button>
        <input type="text" size="5" value="0" id="lowLabel" name="lowLabel"/>
        <br/>
        <input type="submit" />
    </form>
        You scouted team $teamnum for match $matchnum.
    </body>
</html>
_END;
?>