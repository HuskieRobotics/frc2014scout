<!DOCTYPE html>
<html>
    <head>
        <title>MySQL Test - Admin</title>
    </head>
    <body>
        <a href="MySQLEntry.php">Enter Data</a>
        <a href="MySQLRead.php">Read Data</a>
        <h3>Create Database</h3>
        <form action="MySQLCreate.php" method="POST">
            <input type="text" name="newDatabase" placeholder="new database"><br/>
            <button>Create Database</button>
        </form>
        <br/><br/>
        <h3>Add Table to Database</h3>
        <form action="MySQLAdd.php" method="POST">
            <input type="text" name="database" placeholder="database"><br/>
            <input type="text" name="table" placeholder="new table"><br/>
            <input type="text" name="field1" placeholder="field1"><br/>
            <input type="text" name="field2" placeholder="field2"><br/>
            <input type="text" name="field3" placeholder="field3"><br/>
            <button>Add Table</button>
        </form>
        <br/><br/>
        <h3>Delete Database</h3>
        <form action="MySQLDelete.php" method="POST">
            <input type="text" name="database" placeholder="database to delete"><br/>
            <button>Delete Database</button>
        </form>
    </body>
</html>
