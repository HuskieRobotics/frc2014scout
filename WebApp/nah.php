<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>home</title>
</head>

<body>
	<form action="add.php" method="POST">
    	<button>ADD</button>
    </form>
    <form action="subtract.php" method="POST">
    	<button>SUBTRACT</button>
    </form>
	<?php
     	include 'GLOBAL.php';
		echo $value;
	?>
</body>
</html>