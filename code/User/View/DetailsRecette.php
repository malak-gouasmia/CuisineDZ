<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class DetailsRecette
{
    /***************************** */
    public function header()
    {
?>

        <head>
          <title>Recette</title>
          
      <link rel="stylesheet" href="DetailsRecette.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="Script.js"></script>
        
      </head>
    
       
        
    <?php
    }
    
/*** *//***************************** */

    public function RecetteId($Id)
    {
     
      ?>
    
      
        
        <body>
         
          <div class="recipe-page">
              
              <div class="recettetotale">
              <div class="recipe-details">
              <?php 
              $controller = new UserController();
              $res = $controller->getRecettebyId($Id);
              foreach ($res as $row) {
        ?>
        <h2><?php echo $row['Titre']; ?></h2>
                <p>Difficulté :<?php echo $row['Difficulte'] ?></p>
                <p>Temps de préparation :<?php echo $row['TempsCuisson'] ?></p>
                <p>Temps de repos : <?php echo $row['TempsRepos'] ?></p>
                <p>Temps de cuisson :<?php echo $row['TempsPreparation'] ?></p>
                <p>Calories : <?php echo $row['CaloriesRecette'] ?></p>
         
          <?php
       }
       ?>
                
                
              
                
              </div>
              <h3>Ingrédients</h3>
              <ul>
              <?php 
             
              $ingre = $controller-> getIngredientbyidRecette($Id);
              foreach ($ingre as $row2) {
                ?>
                <li><?php echo $row2['NomIngredient'] ?></li>
                <?php
       }
       ?>
                
                <!-- etc. -->
              </ul>
              <h3>Etapes de préparation</h3>
              <ul>
              <?php 
             
             $etap = $controller-> getetapebyidRecette($Id);
             foreach ($etap as $row3) {
               ?>
               <li>Etape numero  <?php  echo $row3['numero'] ?> :<br> <br><?php echo $row3['Description'] ?></li><br>
               <?php
      }
      ?>

                
                <!-- etc. -->
              </ul>
          </div>
          <img class="img" src="<?php echo $row['PathI']?>" alt="<?php echo $row['PathI']?> ">
         
          
            </div>
            
            
            
            </div>
            
  
  
        </body>
     
  <?php }
    
    /***************************** */
   
     
     /***************************** */
     /***************************** */
    public function display($id)
    {
        $this->header();
      
      
       
     
        $view = new PartieFixe();
        $view->Entete();
        $this->RecetteId($id);
        //$this->RecettePlat();
      
      
        $view->Footer();
        
    }
    /***************************** */
}

?>