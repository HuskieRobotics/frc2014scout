<?php
        // variable for using password or not
        // true: use password
        // false: ignore password
$usePassword = false;
$databaseID = "yes";
$databaseUser = "root";
$databasePassword = "Admin";
$databaseIP = "127.0.0.1";
$table = "sTest";

$teamTable = "team_db";
$allianceTable = "alliance_db";
$assignmentTable = "assign_table";

$login_db = "yes";
$login_table = "members";

static $CONNECT_COUNT = 0;

$fieldNames = array("teamNum","matchNum",
    "autoGoalType","autoHotGoal","autoZonePoints",
    "autoHotDetect","initZone","highGoalScores",
    "highGoalShots","lowGoalScores","lowGoalShots",
    "trussScores","trussShots","catchScores","catchShots", "assists",
    "canCatch","canCollect","robotSpeed","robotPushing",
    "robotThrow","teamworkRating","allianceColor","matchResult", 
    "robotRole", "robotBreak", "matchComments", "autoShots");

$fieldNameTypes = array("INT", "INT", "TEXT", "TEXT", "TEXT", "TEXT", 
    "TEXT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT",
    "TEXT", "TEXT", "INT", "INT", "INT", "INT", "TEXT", "TEXT", "TEXT", 
    "TEXT", "TEXT", "INT");

$teamFieldNames = array("MATCH_NUM",
"NAME_OF_SCOUT",
"TEAM_NUM",
"ALLIANCE_COLOR",
"preGamePosition",
"preGameBallOnePosition",
"preGameBallTwoPosition",
"preGameBallThreePosition",
"ballOneAuto",
"ballTwoAuto",
"ballThreeAuto",
"autoHotGoal",
"autoColorZone",
"allianceBallEndTime",
"teleopInitPosition",
"highGoalShots",
"highGoalScores",
"lowGoalShots",
"lowGoalScores",
"trussThrowShots",
"trussThrowScores",
"trussCatchShots",
"trussCatchScores",
"passStarts",
"passRecv",
"robotCycleAssists",
"shotsBlocked",
"passesBlocked",
"preferredPass",
"caughtBall",
"collectedBall",
"playedDefense",
"robotSpeed",
"robotAgl",
"robotPushingPower",
"robotThrowing",
"rolePlayed",
"robotBreakage",
"matchComments",
"foulPoints",
"robotFoulProb");

$teamFieldNameTypes = array("INT", "TEXT", "INT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT",
     "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "INT", "TEXT", "TEXT", "TEXT", "TEXT", 
     "INT", "INT", "INT", "INT", "TEXT", "TEXT", "TEXT", "TEXT", "TEXT");


$allianceFieldNames = array("MATCH_NUM",
"NAME_OF_SCOUT",
"ALLIANCE_COLOR",
"preBallsOnField",
"allianceBallEndTime",
"lateAutoReason",
"allianceFoulPoints",
"foulDescription",
"allianceBreakage");

$allianceFieldNameTypes = array("INT", "TEXT", "TEXT", "INT", "TEXT", "TEXT", "INT", "TEXT", "TEXT");  

$assignmentFieldNames = array("matchNum","team1","team2",
    "team3","team4","team5","team6","matchConCount");

$assignmentFieldNameTypes = array("INT","INT","INT","INT","INT","INT",
    "INT","INT","INT");



