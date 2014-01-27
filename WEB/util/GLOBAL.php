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