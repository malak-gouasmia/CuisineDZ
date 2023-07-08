<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Healthy
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>HealthyRecette</title>
        
   
        <link rel="stylesheet"  href="Healthy.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

    public function HealthyRecette()
    {$controller = new UserController();
    $res = $controller-> getHealthyRecette(700);
    
    ?>
    
    <div class="category"  >
    <h2>Healthy  recettes</h2>
   <p class='paragra'> Voici une sélection des  recettes healthy de  notre base de données, <br>pour vous permettre de découvrir les dernières tendances culinaires sains<p>
    <div class="recipe-slider">
      
    <?php
    
      foreach ($res as $row) {
       
     
         ?>
    <!-- Cadre de recette 1 -->
    <div class="recipe-frame">
      <h3><?php echo $row['Titre'] ?></h3>
                
      <img src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
    
      <p><?php echo $row['Descript'] ?> </p>
      <button ><a href="index.php?page=recette&id=<?php echo $row['IdRecette']; ?>">Afficher la recette </a></button>
    </div>
    <?php  } ?>
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
        $this->HealthyRecette();
       
      
        $view->Footer();
        
    }
    /***************************** */
}

?>