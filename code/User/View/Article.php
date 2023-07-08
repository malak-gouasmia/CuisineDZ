<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Article
{
    /***************************** */
    public function header()
    {
?>

        <head>
          <title>Article</title>
          
      <link rel="stylesheet" href="Article.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="Script.js"></script>
        
      </head>
    
       
        
    <?php
    }
    
/*** *//***************************** */

    public function ArticlebyId($Id)
    {
     
      ?>
    
      
        
        <body>
         
          <div class="recipe-page">
              
              <div class="recettetotale">
              <div class="recipe-details">
              <?php 
              $controller = new UserController();
              $res = $controller->getArticleById($Id);
              foreach ($res as $row) {
        ?>
        <h2><?php echo $row['Titre']; ?></h2>
                
                <p> <?php echo $row['Article'] ?></p>
         
          <?php
       }
       ?>
                
                
              
                
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
        $this->ArticlebyId($id);
        //$this->RecettePlat();
      
      
        $view->Footer();
        
    }
    /***************************** */
}

?>