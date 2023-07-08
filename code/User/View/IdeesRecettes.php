<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class IdeesRecettes
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>IdeesRecettes</title>
        
   
        <link rel="stylesheet"  href="IdeesRecettes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

    public function Idees()
    {$controller = new UserController();

    ?>
    <div class="category"  >
    <h2>Idees Recettes</h2>
    <div class="recipe-slider">
      
    
  </div>
 
  </div>
  <?php }
    
    /***************************** */
   
     
     /***************************** */
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->Idees();
      
        $view->Footer();
        
    }
    /***************************** */
}

?>