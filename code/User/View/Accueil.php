<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/ParCategorie.php');
class Accueil
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>Accueil</title>
        
   
        <link rel="stylesheet"  href="Accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="Script.js"></script>
      </head>
    
       
        
    <?php
    }
    /***************************** */

   
    


    public function Diaporama($id)
    {
?>
<div class="slider">
          <div class="diaporama">
          <?php
          $controller = new UserController();
          $res = $controller->get_diaporama($id);
    
      foreach ($res as $row) {
        ?>
          <img class="img" src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
          <?php
       }
       ?>
           
          </div>
        </div>

        
    <?php
    }
    /******************************* */
    


    
   


   

    public function RecettebyCategory($titre,$catego)
    {$controller = new UserController();
    $res = $controller->getRecettebyCategory($catego);?>
    
    <div class="category"  >
    <h2><?php echo $titre?></h2>
    <div class="recipe-slider">
    <?php
     $i = 0;
     $limit = 10;
      foreach ($res as $row) {
        if ($i >= $limit) {
          break;
       }
         ?>
    <!-- Cadre de recette 1 -->
    <div class="recipe-frame">
      <h3><?php echo $row['Titre'] ?></h3>
      <img src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
    
      <p><?php echo $row['Descript'] ?> </p>
      <button ><a href="index.php?page=recette&id=<?php echo $row['IdRecette']; ?>">Afficher la recette </a></button>
    </div>
    <?php $i++; } ?>
  </div>

  <button ><a href="index.php?page=catego&categorie=<?php echo $row['catego']; ?>">Afficher toutes<br> les recettes </a></button>  
</div>
  <?php }

    
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
       
        $this->Diaporama(1);
        $this->RecettebyCategory('Entrees','entree');
        $this->RecettebyCategory('Plats','plat');
        $this->RecettebyCategory('Desserts','dessert');
        $this->RecettebyCategory('Boissons','boisson');
      
        $view->Footer();
        
    }
    /***************************** */
}

?>