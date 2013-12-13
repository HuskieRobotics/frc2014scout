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
    <head>
        <title>PHP - Form</title>
    </head>
    <body>
        <h1>Form Test</h1>
        <form action="<?php $_PHP_SELF ?>" method="POST"> 
            Entry 1: <input type="text" name="Entry 1"/>
            Entry 2: <input type="text" name="Entry 2"/>
            Entry 3: <input type="text" name="Entry 3"/>
            <input type="submit"/>
        </form>
    </body>
</html>