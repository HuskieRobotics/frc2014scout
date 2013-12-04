<!DOCTYPE html>

<?php
    $writefile = fopen("C:\\Documents and Settings\\NathanL\\Desktop\\FileIOTxt.txt", "w");
    if ($writefile == false) {
        echo ("<h1>Error opening file</h1>");
    }
    fwrite($writefile, "Entry one.\r\n");
    fwrite($writefile, "Second entry.\r\n");
    fwrite($writefile, "Entry the third.\r\n");
    fclose($writefile);
?>

<html>
    <head>
        <title>PHP - File I/O</title>
    </head>
    <body>
        <p>This is what will be written (in three lines):</p>
        <p>Entry one.</p>
        <p>Second entry.</p>
        <p>Entry the third.</p>
        <?php
            echo("<p>Now attempting to read from file.</p></br>");
            $file = fopen("C:\\Documents and Settings\\NathanL\\Desktop\\FileIOTxt.txt", "r");
            if ($file == false) {
                echo ("<h1>Error opening file</h1>");
            }
            echo("<p>" . fread($file, filesize("C:\\Documents and Settings\\NathanL\\Desktop\\FileIOTxt.txt")) . "</p>");
            fclose($file);
        ?>
    </body>
</html>
