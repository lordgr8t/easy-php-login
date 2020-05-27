<?php

    session_start();

    require_once("dbconnect.php");

    $_SESSION["error_messages"] = '';
     
    $_SESSION["success_messages"] = '';
    if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"])){

        if(isset($_POST["captcha"])){
      
            $captcha = trim($_POST["captcha"]);
         
            if(!empty($captcha)){
         
               
                if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                   
         
                    $error_message = "<p class='mesage_error'><strong>Wrong!</strong> Not correct captcha </p>";
         
                    $_SESSION["error_messages"] = $error_message;
         
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
         
                    exit();
                }
         
            }else{
         
                $error_message = "<p class='mesage_error'><strong>Wrong!</strong> Enter captcha </p>";
         
                $_SESSION["error_messages"] = $error_message;
         
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
         
                exit();
         
            }
         
           
            $email = trim($_POST["email"]);
            if(isset($_POST["email"])){
             
                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);
             
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
             
                    if( !preg_match($reg_email, $email)){
                   
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Wrong mail</p>";
                         
                     
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/form_auth.php");
             
                
                        exit();
                    }
                }else{
                     
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter mail!</p>";
                     
                   
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");
             
                  
                    exit();
                }
                 
             
            }else{
              
                $_SESSION["error_messages"] .= "<p class='mesage_error' >pls Email</p>";
                 
               
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
           
                exit();
            }
             
          
            if(isset($_POST["password"])){
 
             
                $password = trim($_POST["password"]);
             
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
             
                
                    $password = md5($password."top_secret");
                }else{
                 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter your pass</p>";
                     
                 
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
             
     
                    exit();
                }
                 
            }else{
          
                $_SESSION["error_messages"] .= "<p class='mesage_error' >no pass!</p>";
                 
              
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
       
                exit();
            }

            $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'");
             
            if(!$result_query_select){
             
                $_SESSION["error_messages"] .= "<p class='mesage_error' >No user in db wrong server</p>";
                 
            
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
                exit();
            }else{
             
                if($result_query_select->num_rows == 1){
                     
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
             
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");
             
                }else{
                     
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Wrong login/pass</p>";
                     
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
             
                    exit();
                }
            }
        }else{
         
            exit("<p><strong>Wrong!</strong> captcha <a href=".$address_site."> main </a>.</p>");
        }

     
    }else{
        exit("<p><strong>Wrong!</strong> You enter by url <a href=".$address_site."> main </a>.</p>");
    }