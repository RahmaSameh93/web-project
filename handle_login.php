<?php
//var_dump($_REQUEST);

if (!empty($_REQUEST["email"])&& !empty($_REQUEST["password"])){


   require_once('classes.php');
  $user= user::login($_REQUEST["email"],($_REQUEST["password"]));


  if(!empty($user)){

  }else{
    header("location:index.php?msg=no_user");

  }

}
else{
    header("location:index.php?msg=empty_field");
}