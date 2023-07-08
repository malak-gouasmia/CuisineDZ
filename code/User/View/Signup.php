<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Signup
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>SignUp</title>
        
   
        <link rel="stylesheet"  href="Signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

public function Sign(){

  ?>
<div class="titre"> 
<h3>Bienvenue sur notre page d'inscription</h3>
<h4> Veuillez remplir le formulaire ci-dessous pour créer votre compte et rejoindre notre communauté</h4>
</div>
!

<form methode="post" action='<?php $controller=new UserController();$controller->Signupuser();?>' >
 

  <label for="Nom">Nom:</label>
  <input type="text" id="Nom" name="Nom">
  <?php if (isset($_POST['AddUser'])) echo 'jkbkb' ;else echo '3333'?>

  <label for="Prenom">Prénom:</label>
  <input type="text" id="Prenom" name="Prenom">

  <label for="Sexe">Sexe:</label>
  <input type="text" id="Sexe" name="Sexe">

  <label for="Mail">E-mail:</label>
  <input type="email" id="Mail" name="Mail">

  <label for="DateNaissance">Date de naissance:</label>
  <input type="text" id="DateNaissance" name="DateNaissance">

  <label for="MotPasse">Mot de passe:</label>
  <input type="password" id="MotPasse" name="MotPasse">
  <input id="valider-add" type="submit" name="AddUser"  >send</input>
  

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
        $this->Sign();
      
      
        $view->Footer();
        
    }
    /***************************** */
}

?>