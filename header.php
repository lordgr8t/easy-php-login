<?php
    //Запускаем сессию
    session_start();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Easy php login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                "use strict";
               
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');
                 
                mail.blur(function(){
                    if(mail.val() != ''){
         
                        
                        if(mail.val().search(pattern) == 0){
                           
                            $('#valid_email_message').text('');
         
                         
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                         
                            $('#valid_email_message').text('Wrong mail');
         
                         
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_email_message').text('Enter your mail');
                    }
                });
         
              
                var password = $('input[name=password]');
                 
                password.blur(function(){
                    if(password.val() != ''){
         
                        if(password.val().length < 6){
                    
                            $('#valid_password_message').text('Minimal pass 6 sim');
         
                            $('input[type=submit]').attr('disabled', true);
                             
                        }else{
                       
                            $('#valid_password_message').text('');
         
           
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Enter pass');
                    }
                });
            });
        </script>
    </head>
    <body>
 
        <div id="header">
            <h2>Head</h2>
 
            <a href="/index.php">Main</a>
 
            <div id="auth_block">
            <?php
             
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                 
            ?>
                    <div id="link_register">
                        <a href="/form_register.php">Sign up</a>
                    </div>
             
                    <div id="link_auth">
                        <a href="/form_auth.php">Sign in</a>
                    </div>
            <?php
                }else{
                  
            ?> 
                    <div id="link_logout">
                        <a href="/logout.php">Exit</a>
                    </div>
            <?php
                }
            ?>
            </div>
             <div class="clear"></div>
        </div>