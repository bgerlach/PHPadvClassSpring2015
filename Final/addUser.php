    <?php include_once 'Header.php'; ?>
<html>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="content">
            <h1>Add User</h1>
            <form action="addUser_code.php" method="post"
                  >
                </select>
                <br />
                <label>Username:</label>
                <input type="text" name="username"/>
                <br />
                <label>Password</label>
                <input type="text" name="password" />
                <br />
                <input type="submit" value="AddUser"/>
                <br />
            </form>
            
        </div>
</body>
 

</html>