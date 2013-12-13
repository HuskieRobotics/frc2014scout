<?php
include 'themvars.php';

newTournament($_POST['tName'],$_POST['loc'],$_POST['year'],$_POST['mo'],$_POST['day']);

header( 'Location: compedit.php' ) ;
?>