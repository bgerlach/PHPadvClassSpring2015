<?php 

//include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );

        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
       
        $util = new Util();
        $validator = new Validator();
        $emailDAO = new EmailDAO($db);
        $emailTypeDAO = new EmailTypeDAO($db);
        $emailModel = new EmailModel();
        $emailTypeid = filter_input(INPUT_POST, 'emailtypeid');
        $emailTypes = $emailTypeDAO->getAllRows();
         
        if ( $util->isPostRequest() ) {
            
            $emailModel->map(filter_input_array(INPUT_POST));
                       
        } else {
            $emailid = filter_input(INPUT_GET, 'emailid');
            $emailModel = $emailDAO->getById($emailid);
        }
        
        
        $emailid = $emailModel->getEmailid();
        $email = $emailModel->getEmail();
        $active = $emailModel->getActive();  
              
        
        $emailService = new EmailService($db, $util, $validator, $emailDAO, $emailModel);
        
        if ( $emailDAO->idExisit($emailModel->getEmailid()) ) {
            $emailService->saveForm();
        }
        
        
        ?>
        
        
         <h3>Update Email</h3>
        <form action="#" method="post">
             <input type="hidden" name="emailid" value="<?php echo $emailid; ?>" />
            <label>Email:</label> 
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" />
            <br /><br />
            <label>Email Type:</label>
            <select name="emailtypeid">
            <?php 
                foreach ($emailTypes as $value) {
                    if ( $value->getEmailtypeid() == $emailTypeid ) {
                        echo '<option value="',$value->getEmailtypeid(),'" selected="selected">',$value->getEmailtype(),'</option>';  
                    } else {
                        echo '<option value="',$value->getEmailtypeid(),'">',$value->getEmailtype(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
             <br /><br />
            <input type="submit" value="Submit" />
        </form>
         
         
         <?php         
             $emailService->displayEmailActions();
                          
         ?>
                     <a href="email-test.php">Home</a>      
    </body>
</html>
