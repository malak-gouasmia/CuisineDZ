<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class LoginUser
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>Login</title>
        
   
        <link rel="stylesheet"  href="Login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

public function LogIn(){
  $controller= new UserController();
$controller->Login();
  ?>


<form method="post" action="">
<h2>Connectez-vous pour accéder à votre compte<br>  de cuizine dz </h2>
  <label for="mail">E-mail</Address></label>
  <input type="text" name="mail" id="mail">
  <label for="password">password</label>
  <input type="password" name="password" id="password">
  <button type="submit" name="loginUser">LogIn</button>
</form>
  <?php
}
     /***************************** */
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->LogIn();
      
      
        $view->Footer();
        
    }
    /***************************** */
}

?>