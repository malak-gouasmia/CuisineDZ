<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class ParCategorie
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>page2</title>
        
   
        <link rel="stylesheet"  href="ParCategorie.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

    public function Recette($catego,$titre)
    {$controller = new UserController();
    $res = $controller->getRecettebyCategory($catego);?>
    
    <div class="category"  >
    <h2><?php echo $titre?></h2>
    <div class="recipe-slider">
      
    <?php
     $i = 0;
     $limit = 10;
      foreach ($res as $row) {
     
         ?>
    <!-- Cadre de recette 1 -->
    <div class="recipe-frame">
      <h3><?php echo $row['Titre'] ?></h3>
                
      <img src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
    
      <p><?php echo $row['Descript'] ?> </p>
      <button ><a href="index.php?page=recette&id=<?php echo $row['IdRecette']; ?>">Afficher la suite </a></button>
    </div>
    <?php $i++; } ?>
  </div>
 
  </div>
  <?php }
    
    /***************************** */
   
     
     /***************************** */
     /***************************** */
    public function display($catego,$titre)
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->Recette($catego,$titre);
      
        $view->Footer();
        
    }
    /***************************** */
}

?>