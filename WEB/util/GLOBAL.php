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

$teamTable = "team_table";
$allianceTable = "alliance_table";
$assignmentTable = "assign_table";
$pitTable = "pit_table";

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
"autoHotGoalOne",
"autoHotGoalTwo",
"autoHotGoalThree",
"autoColorZone",
"allianceBallEndTime",
"teleopInitPosition",
"highGoalShots_colored",
"highGoalScores_colored",
"highGoalShots_white",
"highGoalScores_white",
"highGoalShots_goalie",
"highGoalScores_goalie",
"lowGoalShots",
"lowGoalScores",
"trussThrowShots",
"trussThrowScores",
"trussCatchShots",
"trussCatchScores",
"passStarts",
"passRecvHuman",
"passRecvRobot",
"shotsBlocked",
"passesBlocked",
"fumbles",
"preferredPass",
"caughtBallHuman",
"caughtBallRobots",
"collectedBall",
"pushed",
"canHandOff",
"defense_inGoalie",
"defense_stopRobot",
"defense_stopGettingBall",
"robotSpeed",
"maneuvered",
"robotPushingPower",
"robotThrowing",
"role_defense",
"role_shooter",
"role_assister",
"role_catcher",
"role_soloCycler",
"role_soloTrussCatcher",
"robotBreakage",
"breakDescription",
"matchComments",
"foulPoints",
"robotFoulProb");

$teamFieldNameTypes = array(
"TEXT",
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT",
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT",
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT",
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT", 
"TEXT",
"TEXT",
"TEXT", 
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT", 
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT",
"TEXT");


$allianceFieldNames = array("MATCH_NUM",
"NAME_OF_SCOUT",
"ALLIANCE_COLOR",
"preBallsOnField",
"allianceBallEndTime",
"lateAutoReason",
"allianceFoulPoints",
"foulDescription",);

$allianceFieldNameTypes = array("INT", "TEXT", "TEXT", "INT", "TEXT", "TEXT", "INT", "TEXT");  

$assignmentFieldNames = array("matchNum","team1","team2",
    "team3","team4","team5","team6","matchConCount","allianceConCount");

$assignmentFieldNameTypes = array("INT","INT","INT","INT","INT","INT",
    "INT","INT","INT", "INT");

$pitFieldNames = array("driveTrain",
    "numberMotors","descriptionMotors","shifters","topspeed","shooterGoal","shootingRange","shotHeight","blockers","blockerDescription",
    "collectorType","collectorType_other","collectorLocation","weightRobot");

$pitFieldNameTypes = array("TEXT","TEXT","TEXT","TEXT","TEXT","TEXT",
    "TEXT","TEXT","TEXT","TEXT","TEXT","TEXT","TEXT","TEXT");