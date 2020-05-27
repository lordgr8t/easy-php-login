<?php

    require_once("header.php");
?>

<div class="block_for_messages">
    <?php
      
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
         
            unset($_SESSION["error_messages"]);
        }
 
      
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
       
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
  
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
        <div id="form_register">
            <h2>Form sign up</h2>
 
            <form action="register.php" method="post" name="form_register">
                <table>
                    <tbody><tr>
                        <td> Name: </td>
                        <td>
                            <input type="text" name="first_name" required="required">
                        </td>
                    </tr>
 
                    <tr>
                        <td> Second name: </td>
                        <td>
                            <input type="text" name="last_name" required="required">
                        </td>
                    </tr>
              
                    <tr>
                        <td> Email: </td>
                        <td>
                            <input type="email" name="email" required="required"><br>
                            <span id="valid_email_message" class="mesage_error"></span>
                        </td>
                    </tr>
              
                    <tr>
                        <td> Pass: </td>
                        <td>
                            <input type="password" name="password" placeholder="6 sim" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Captcha: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="captcha" /> <br><br>
                                <input type="text" name="captcha" placeholder="captcha" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="SIGNUP!">
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>You alredy signupping. You in system!</h2>
        </div>
<?php
    }
     
    
    require_once("footer.php");
?>