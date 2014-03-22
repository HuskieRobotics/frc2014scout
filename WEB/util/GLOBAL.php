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
$cycleTable = "cycle_table";

$login_db = "yes";
$login_table = "members";

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
"allianceBallEndTime_checkbox",
"allianceBallEndTime",
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
"passRecvGround",
"shotsBlocked",
"fumbles",
"fumbleDescription",
"pushed",
"throwsToHumanOverTruss",
"defense_inGoalie",
"defense_passBlock",
"defense_shotBlock",
"defense_inboundBlock",
"robotSpeed",
"maneuvered",
"role_defense",
"role_shooter",
"role_assister",
"role_catcher",
"role_soloCycler",
"role_soloTrussCatcher",
"robotBreakage",
"breakDescription",
"foulComments",
"fumbleComments",
"collectComments",
"matchComments");

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
"TEXT");


$allianceFieldNames = array("MATCH_NUM",
"NAME_OF_SCOUT",
"ALLIANCE_COLOR",
"seedNum",
"HASH",
"preBallsOnField",
"allianceBallEndTime",
"lateAutoReason",
"allianceAutoPoints",
"allianceTeleopPoints",
"allianceFoulPoints",
"allianceTotalPoints",
"foulDescription",
"comments");

$allianceFieldNameTypes = array("INT", "TEXT", "TEXT", "TEXT",
    "INT","INT", "TEXT", "TEXT", "INT", "INT","INT","INT","TEXT","TEXT");  

$assignmentFieldNames = array("matchNum","team1","team2",
    "team3","team4","team5","team6","matchConCount","allianceConCount");

$assignmentFieldNameTypes = array("INT","INT","INT","INT","INT","INT",
    "INT","INT","INT", "INT");

$pitFieldNames = array("SCOUT_NAME","TEAM_NUM","driveTrain", "describeDrivetrain",
    "numberMotors","descriptionMotors","wheelType","shifters","topspeed","shooterGoal","shootingRange","shotHeight",
    "robotHeight","blockers","blockerDescription",
    "collectorType","collectorType_other","collectorLocation",
    "weightRobot","comments");

$pitFieldNameTypes = array("TEXT","TEXT","TEXT","TEXT","TEXT","TEXT","TEXT",
    "TEXT","TEXT","TEXT","TEXT","TEXT","TEXT","TEXT","TEXT",
    "TEXT","TEXT","TEXT","TEXT","TEXT");

$cycleFieldNames = array("hash", "startTime", "endTime","numAssists");

$cycleFieldNameTypes = array("TEXT","TEXT","TEXT","TEXT");