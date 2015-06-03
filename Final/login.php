<html>

    <link rel="stylesheet" type="text/css" href="main.css"/>
    
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
          <body>  
    <?php 
    
    //main login page
    
    include_once 'Header.php';
    

    
    if (isset($errors)&& count($errors)> 0) : ?>
        <h2>Errors:</h2>
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

                <div id="content">
            <h1>Login</h1>
            <form action="login_code.php" method="post"
                  >
                </select>
                <br />
                <label>Username:</label>
                <input type="text" name="username"/>
                <br />
                <label>Password</label>
                <input type="text" name="password" />
                <br />
                <input type="submit" value="Login"/>
                <br />
            </form>          
        
                  <a href="addUser.php">New User</a>  
                
                </div>

</body>
</html>

