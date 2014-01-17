<?php
        // variable for using password or not
        // true: use password
        // faslse: ignore password
        $usePassword = False;
	$databaseID = "yes";
	$databaseUser = "root";
	$databasePassword = "Admin";
        
        $fieldNames = array("teamNum","matchNum",
            "autoGoalType","autoHotGoal","autoZonePoints",
            "autoHotDetect","initZone","highGoalScores",
            "highGoalShots","lowGoalScores","lowGoalShots",
            "trussScores","trussShots","catchScores","catchShots", "assists",
            "canCatch","canCollect","robotSpeed","robotPushing",
            "robotThrow","teamworkRating","allianceColor","matchResult", 
            "robotRole", "robotBreak", "matchComments", "autoShots");
        
        //$fieldNameTypes = array("INT", "INT", "TEXT",)
                
?>