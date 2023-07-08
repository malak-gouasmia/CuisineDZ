<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
class PartieFixe
{
    /***************************** */
    
     /***************************** */
    public function Entete()
    {
?>
<head>
        
        
   
        <link rel="stylesheet"  href="PartieFixe.css">
   
      </head>
  <div id="header">
          <img src="./img/logo.PNG" alt="Logo" id="logo">
          <div class="bsl">
          <button ><a href="index.php?page=signup">SignUp</a></button>
          <button ><a href="index.php?page=login">Login</a></button>
          
    </div>
         
          <div id="social-links">
            <a href="https://web.facebook.com/index.php?_rdc=1&_rdr"><img src="img/fb.png" alt="Facebook"></a>
            <a href="https://twitter.com"><img src="img/twit.png" alt="Twitter"></a>
            <a href="https://www.instagram.com"><img src="img/insta.webp" alt="Instagram"></a>
          </div>
          
        </div>
        <nav>
          <ul>
            <li><a href="index.php?page=acceuil">Accueil</a></li>
            <li><a href="index.php?page=news">News</a></li>
            <li><a href="index.php?page=idees">Idées de Recettes</a></li>
            <li><a href="index.php?page=healthy">Healthy</a></li>
            <li><a href="index.php?page=saison">Saisons</a></li>
            <li><a href="index.php?page=fete">Fêtes</a></li>
            <li><a href="index.php?page=nutrition">Nutrition</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
            <!-- <li><a href="index.php?page=login">login</a></li> -->
           <!-- <li><a href="index.php?page=signup">Signup</a></li>  -->
         
          </ul>
        </nav>
        

       
   
        
    <?php
    }/************ */
    /******************************* */
    public function Footer()
    {
?>
<head>
        <link rel="stylesheet"  href="PartieFixe.css">
      </head>
<footer>
  <div class="container">
    <p>Description de notre site</p>
    <div class="menu">
      
        <a href="#">Accueil</a>
        <a href="#">À propos</a>
        <a href="#">Contact</a>
      
    </div>
    
    <div class="contact-links">
      <div class="item">
      <a href="#"><i class="fa fa-envelope"></i> Contact par email</a>
      <p>jm_gouasmia_gouasmia@esi.dz</p>
    </div>
    <div class="item">
      <a href="#"><i class="fa fa-phone"></i> Contact par téléphone</a>
      <p>0787878676</p>
    </div>
    </div>
  </div>
</footer>

        
    <?php
    }

/*** *//***************************** */

    
    /***************************** */
   
     
     /***************************** */
     /***************************** */
    public function display()
    {
        
        $this->Entete();

      
        $this->Footer();
        
    }
    /***************************** */
}

?>