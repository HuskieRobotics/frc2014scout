<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Enter Data</title>
    </head>
    <body>
        <h3>Add Data to Database</h3>
        <form action="MySQLInsert.php" method="POST">
            <input type="text" name="database" placeholder="database"><br/>
            <input type="text" name="table" placeholder="table"><br/>
            <input type="text" name="field1" placeholder="field1"><br/>
            <input type="text" name="field2" placeholder="field2"><br/>
            <input type="text" name="field3" placeholder="field3"><br/>
            <input type="text" name="value1" placeholder="value1"><br/>
            <input type="text" name="value2" placeholder="value2"><br/>
            <input type="text" name="value3" placeholder="value3"><br/>
            <button>Add Data</button>
        </form>
    </body>
</html>
