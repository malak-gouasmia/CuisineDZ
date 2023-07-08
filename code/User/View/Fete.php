<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Fete
{
    /***************************** */
    public function header()
    {
?>
<head>
        <title>Fete</title>
        
   
        <link rel="stylesheet"  href="fete.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
      </head>
    
       
        
    <?php
    }
    /***************************** */

    
    /******************************* */
 


    public function RecetteFete()
    {$controller = new UserController();
    
    $fetes=$controller->getFete();

   
      foreach ($fetes as $fete) {
        $res = $controller->getRecetteFete($fete['NomFete']);
       
    ?>
  
    <div class="category"  >
    <h2><?php echo $fete['NomFete']?></h2>
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
    <?php } ?>
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
        $this->RecetteFete();
        
      
        $view->Footer();
        
    }
    /***************************** */
}

?>