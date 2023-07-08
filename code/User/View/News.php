<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class News
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>News</title>
        
   
        <link rel="stylesheet"  href="News.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 

/*** *//***************************** */

    public function NewsRecette()
    {$controller = new UserController();
    $res = $controller->getNewsRecette();?>
    
    <div class="category"  >
    <h2>Les nouveautes de nos recettes</h2>
   <p class='paragra'> Voici une sélection des dernières recettes ajoutées à notre base de données, <br>pour vous permettre de découvrir les dernières tendances culinaires et de vous inspirer pour vos prochains repas. <p>
    <div class="recipe-slider">
      
    <?php
     $i = 0;
     $limit = 8;
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
 
  </div>
  <?php }
    
    /***************************** */
   
     
    public function NewsArticle()
    {$controller = new UserController();
    $res = $controller->getArticle();?>
    
    <div class="category"  >
    <h2>Les nouveautes de nos Articles</h2>
   <p class='paragra'> Vous aimez découvrir de nouvelles recettes et idées culinaires? Alors ne manquez pas les dernières nouveautés de nos articles de cuisine! Nous avons rassemblé pour vous les meilleures recettes, les tendances culinaires actuelles et les astuces de chefs professionnels pour vous aider à impressionner vos invités lors de vos prochains dîners. Que vous soyez un débutant en cuisine ou un expert culinaire, il y a toujours quelque chose de nouveau à découvrir dans notre section de nouveautés de recettes. <br> <p>
    <div class="recipe-slider">
      
    <?php
     $i = 0;
     $limit = 8;
      foreach ($res as $row) {
       
     
         ?>
    <!-- Cadre de recette 1 -->
    <div class="recipe-frame">
      <h3><?php echo $row['Titre'] ?></h3>
                
      <img src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
    
     
      <button ><a href="index.php?page=article&idNews=<?php echo $row['IdNews']; ?>">Afficher l article </a></button>
    </div>
    <?php $i++; } ?>
  </div>
 
  </div>
  <?php }
     /***************************** */
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->NewsRecette();
        $this->NewsArticle();
      
        $view->Footer();
        
    }
    /***************************** */
}

?>