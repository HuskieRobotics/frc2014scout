<?php

include 'GLOBAL.php';
if ($usePassword) {
    $conn = mysql_connect($databaseIP, $databaseUser, $databasePassword);
} else {
    $conn = mysql_connect($databaseIP, $databaseUser);
}
$conn = mysql_connect($databaseIP, $databaseUser);
if (!$conn) {
    die("Could not connect: " . mysql_error());
}

$database = "yes";
$table = "sTest";

mysql_select_db($databaseID);


function buildArray($fieldNamesInput) 
{    
    $length = count($fieldNamesInput);

    $assocArray = array();
    for ($i = 0; $i < $length; $i++) 
    {

        $fieldName = $fieldNamesInput[$i];

        if (isset($_POST[$fieldName]))
            $valueToPut = $_POST[$fieldName];
        else
            $valueToPut = "false";

        $assocArray[$fieldName] = $valueToPut;
    }
    return $assocArray;
}

$assocArray2 = buildArray($teamFieldNames);

$sql = "INSERT INTO $table";


$sql .= " (`" . implode("`, `", array_keys($assocArray2)) . "`)";


$sql .= " VALUES ('" . implode("', '", $assocArray2) . "') ";

$return = mysql_query($sql, $conn);
if (!$return) {
    die("Could not insert data: " . mysql_error());
}


echo "Data insertion successful.\n";

mysql_close($conn);

echo "Connection successful.";
?>
