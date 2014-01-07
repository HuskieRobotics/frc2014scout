<!DOCTYPE html>

<?php
    $filename = "C:\\Documents and Settings\\NathanL\\Desktop\\FormOutput.txt";
    $file = fopen($filename, "w");
    foreach ($_POST as $key=>$value) {
        fwrite($file, $key . ": " . $value . "\r\n");
    }
    fclose($file);
?>

<html>
    <body>
        <h1>Form submission successful!</h1>
    </body>
</html>