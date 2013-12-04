<?php
//everything here is non-critical data, simply for conveinience
session_start();
$_SESSION['user']=$_POST['name'];//remember scouter name
$_SESSION['lastm']='None';//remember last match entered

header( 'Location: frcScoutbeta.php' ) ;
?>