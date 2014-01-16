<?php

// scouting app developed by Yasha Mostofi
// for team 3061, Huskie Robotics from Naperville, IL
//Version: .2
//TODO:
// add miss/score buttons for tele/auto

if (isset($_POST['teamnum']))
    $teamnum = $_POST['teamnum'];
else
    $teamnum = "";

if (isset($_POST['matchnum']))
    $matchnum = $_POST['matchnum'];
else
    $matchnum = "";

if (isset($_POST['highLabelA']))
    $highLabelA = $_POST['highLabelA'];
else
    $highLabelA = "";

if (isset($_POST['medLabelA']))
    $medLabelA = $_POST['medLabelA'];
else
    $medLabelA = "";

if (isset($_POST['lowLabelA']))
    $lowLabelA = $_POST['lowLabelA'];
else
    $lowLabelA = "";

if (isset($_POST['highLabelT']))
    $highLabelT = $_POST['highLabelT'];
else
    $highLabelT = "";

if (isset($_POST['medLabelT']))
    $medLabelT = $_POST['medLabelT'];
else
    $medLabelT = "";

if (isset($_POST['lowLabelT']))
    $lowLabelT = $_POST['lowLabelT'];
else
    $lowLabelT = "";

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
    $field3 = "highScoreA";
    $field4 = "medScoreA";
    $field5 = "lowScoreA";
    $field6 = "highScoreT";
    $field7 = "medScoreT";
    $field8 = "lowScoreT";

    mysql_select_db($databaseID);
    $sql = "INSERT INTO $table " .
            "($field1, $field2, $field3, $field4, $field5, $field6, $field7,"
            . "$field8) " .
            "VALUES " .
            "($teamnum,$matchnum,$highLabelA,$medLabelA,$lowLabelA,"
            . "$highLabelT, $medLabelT, $lowLabelT) ";
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
        <title>3061 Scouting - Home</title>
        <link rel='stylesheet' type='text/css' href='stylesheet.css'/>

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

    </head>
    <body>
    <div id="container">
        <div id="header"><h1>3061 Scouting</h1>
            <nav>
                <ul class="top-menu">
                    <li><a href="index.php">enter</a><div class="menu-item" id="enter"></div></li>
                    <li><a href="read.php">read</a><div class="menu-item" id="read"></div></li>
                </ul>
            </nav>
                </div>

        <div id="content"><h1>Enter Data</h1>

        <!--
        <div id="matrixUI">
            <form action="" method="post" name="matrixUIForm">
                <button type="button" id="1blue" class="matrixBlue"></button>
                <button type="button" id="2blue" class="matrixBlue"></button>
                <button type="button" id="3blue" class="matrixBlue"></button>
                
                <br/>

                <button type="button" id="1white" class="matrixWhite"></button>
                <button type="button" id="2white" class="matrixWhite"></button>
                <button type="button" id="3white" class="matrixWhite"></button>
                
                <br/>
                
                <button type="button" id="1red" class="matrixRed"></button>
                <button type="button" id="2red" class="matrixRed"></button>
                <button type="button" id="3red" class="matrixRed"></button>
            </form>
        </div>
        -->

	<form action="index.php" method="post" name="form"> 
    	Team # <input type="text" name="teamnum" placeholder="3061" />
        Match # <input type="text" name="matchnum" placeholder="1"/>

        <h3>AUTO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
            TELEOP</h3> 
    	<button type="button" id="highPlusA" class="plus">+</button>
        <button type="button" id="highMinusA" class="minus">-</button>
        <input type="text" size="5" value="0" id="highLabelA" name="highLabelA" class="label"/>
        high &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" id="highPlusT" class="plus">+</button>
        <button type="button" id="highMinusT" class="minus">-</button>
        <input type="text" size="5" value="0" id="highLabelT" name="highLabelT" class="label"/>
        <br/>
        <br/>
        <button type="button" id="medPlusA" class="plus">+</button>
        <button type="button" id="medMinusA" class="minus">-</button>
        <input type="text" size="5" value="0" id="medLabelA" name="medLabelA" class="label"/>
        medium &nbsp;
        <button type="button" id="medPlusT" class="plus" class="plus">+</button>
        <button type="button" id="medMinusT" class="minus">-</button>
        <input type="text" size="5" value="0" id="medLabelT" name="medLabelT" class="label"/>
        <br/>
        <br/>
        <button type="button" id="lowPlusA" class="plus">+</button>
        <button type="button" id="lowMinusA" class="minus">-</button>
        <input type="text" size="5" value="0" id="lowLabelA" name="lowLabelA" class="label"/>
        low &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" id="lowPlusT" class="plus">+</button>
        <button type="button" id="lowMinusT" class="minus">-</button>
        <input type="text" size="5" value="0" id="lowLabelT" name="lowLabelT" class="label"/>
        <br/>
        <br/>
        <br/>
        &nbsp;&nbsp; &nbsp;  
        <input type="submit" />
    </form>
        You scouted team $teamnum for match $matchnum.
        <br/>
  
    </div>
    <br class="clearFloat" />
        
    <div id="footer">
        <p>&copy; Yasha Mostofi 2013</p>
    </div>
        
    </div>
    </body>
</html>
_END;
?>