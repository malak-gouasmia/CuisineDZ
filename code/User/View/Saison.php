<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Saison
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>Saison</title>
   
        <link rel="stylesheet"  href="Saison.css">
   
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 


    public function RecetteSaison()
    {$controller = new UserController();
    
    $saisons=$controller->getSaison();
   
   
      foreach ($saisons as $saison) {
      
        $Recettes=$controller->getRecette();

       
    ?>
  
    <div class="category"  >
    <h2><?php echo $saison['NomSaison']?></h2>
    <div class="recipe-slider">
    <?php


foreach ($Recettes as $Recette) {
    $res = $controller->getSaisonRecette($Recette['IdRecette']);
    if(is_array($res)){
        foreach($res as $saisonRecette){
            if($saisonRecette==$saison['NomSaison']){
                ?>
                <!-- Cadre de recette 1 -->
                <div class="recipe-frame">
                    <h3><?php echo $Recette['Titre'] ?></h3>
                    <img src="<?php echo $Recette['PathI']?>" alt="<?php echo $Recette['PathI']?> ">
                    <p><?php echo $Recette['Descript'] ?> </p>
                    <button ><a href="index.php?page=recette&id=<?php echo $Recette['IdRecette']; ?>">Afficher la recette </a></button>
                </div>
                <?php
                break;
            }
        }
    }
    else if($res==$saison['NomSaison']){
        ?>
        <!-- Cadre de recette 1 -->
        <div class="recipe-frame">
            <h3><?php echo $Recette['Titre'] ?></h3>
            <img src="<?php echo $Recette['PathI']?>" alt="<?php echo $Recette['PathI']?> ">
            <p><?php echo $Recette['Descript'] ?> </p>
            <button ><a href="index.php?page=recette&id=<?php echo $Recette['IdRecette']; ?>">Afficher la recette </a></button>
        </div>
        <?php
    }
}
?>
  </div>
 
 
</div>
  <?php }}

     /***************************** */
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->RecetteSaison();
        
      
        $view->Footer();
        
    }
    /***************************** */
}

?>