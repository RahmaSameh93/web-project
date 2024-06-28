<?php
session_start();
$errors=[];
if(empty($_REQUEST["name"]))$errors["name"]="Name is Requird";
if(empty($_REQUEST["email"]))$errors["Email"]="Email is Requird";
if(empty($_REQUEST["pw"])||empty($_REQUEST["pc"]))
{$errors["pw"]="Password And password confirmation is Requird";}

else if($_REQUEST["pw"] != $_REQUEST["pc"]){
    $errors["pc"]="Password confirmation must be equal password";

}

$name= htmlspecialchars(trim ($_REQUEST["name"])) ;
$email=filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
$password= htmlspecialchars($_REQUEST["pw"]);
$password_confirmation =htmlspecialchars($_REQUEST["pc"]);
$phone =htmlspecialchars($_REQUEST["phone"]);

if(!empty ($_REQUEST["email"])&& !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))$errors["email"]="Email invalid format please add aa@gmail.com";

if(empty($errors)){
      require_once('classes.php');
      try{
        $rslt =Subscriber::register($name,$email,md5($password),$phone);
        header("location:index.php?msg=sr");

      }catch(\Throwable $th){
        header("location:index.php?msg=ar");
      } 
      
     }

 else{
    $_SESSION["errors"]=$errors;
     header("location:register.php");
 }

 

