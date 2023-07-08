<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class Nutrition
{
    /***************************** */
    public function header()
    {
?>
<head>
   <title>Nutrition</title>
   <link rel="stylesheet"  href="Nutrition.css">
     
     
   </head>
    
       
        
    <?php
    }
  

    public function IngredientNutrition()
    { $controller = new UserController();
     
      $ingredients = $controller-> getIngredient();
              
        ?>
      
    
    <div class="frameN">
        <h1>Nutrition  <i class="fas fa-utensils table-icon"></i></h1>
        <?php foreach ($ingredients as $ingredient) {
       //$ingredient['IdIngredients']
          $nutritions= $controller-> getNutrition($ingredient['IdIngredients']);
        
         
          ?>
      <table>
        <tr>
        <th>Ingredient</th>
          <th>Calories</th>
        <?php foreach ($nutritions as $nutrition) {
       
          ?>
         
          <th><?php echo $nutrition['NomNutrition']  ?></th>
          
          <?php }
       
       ?>
          <th>Healthy</th>
          <th>Season</th>
        </tr>
       
        <tr>
          <td> <h3><?php echo $ingredient['NomIngredient']  ?></h3>
            
            <img class="img-ingredient" src="<?php echo $ingredient['PathI']?>"></td>
            <td ><?php echo $ingredient['CaloriesIngredient']  ?></</td>
          
          <?php 
           $nut= $controller-> getNutrition($ingredient['IdIngredients']);
          foreach ($nut as $n) {
       
       ?>
      
       <td><?php echo $n['quant']  ?></td>
       
       <?php }
    
    ?>
          
          <td class="<?php echo $ingredient['IsHealthy']  ?>"><?php echo $ingredient['IsHealthy']  ?></td>
          <td><?php echo $ingredient['NomSaison']  ?></td>
        </tr>
        
    </table>
    <?php } ?>
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
        $this->IngredientNutrition();
        $view->Footer();
       
     
        
    }
    /***************************** */
}

?>