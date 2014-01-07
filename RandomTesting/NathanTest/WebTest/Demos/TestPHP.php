<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="TestCSS.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> <!--base jQuery-->
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>				<!--jQuery UI-->
	<script type="text/javascript" src="TestJS.js"></script>
	<title>PHP Test</title>
    </head>
    <body>
	<div>
            <h1>This is a webpage</h1>
	</div>
	<p>If this is blue, css is working.</p>
        <p> <?php
            echo "This means that the web server is running php.";
        ?> </p>
    </body>
</html>
