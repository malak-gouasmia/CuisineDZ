<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './code/Admin/Controller/Controller.php');
class dashboardView
{
    /***************************** */
    public function header()
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
           
            <link rel="stylesheet" type="text/css" href="Style.css">
            <script src="./jquery-3.6.0.min.js"></script>
            <script src="./index.js"></script>
            <title>admin Dashboard</title>
        </head>
        <body>
       
        
        <div id="header">
          <img src="./img/logo.PNG" alt="Logo" id="logo">
          <h1>Espace Admin du site cuizine dz </h1>
         
          <section>
            <form action="<?php $controller=new adminController();$controller->LogOut()?>" method="post">
                <button type="submit" name="logout">Logout</button>
        </form>
        </section>
          
        </div>
        

        <nav>
          <ul>
          <li><a href="#">Gestion des recettes</a></li>
            <li><a href="#"> Gestion des « News »</a></li>
            <li><a href="#">La gestion des utilisateurs</a></li>
            <li><a href="#">Gestion de la nutrition </a></li>
            <li><a href="#">Paramètres</a></li>
           
         
          </ul>
        </nav>
        </Body>
    <?php
    }
    /***************************** */
    public function logout()
    {
    ?>
        <!--
            Define logout button 
        -->
        <section>
            <form action="<?php $controller=new adminController();$controller->LogOut()?>" method="post">
                <button type="submit" name="logout">Logout</button>
        </form>
        </section>
    <?php
    }
    /***************************** */
    public function Recette()
    {
       

    ?>
    <div class="Categorie">
        <h1>Gestion de Recette </h1>
    <!-- Bouton pour afficher le formulaire -->
    <div classe="ajout">
    <h2>Ajouter une nouvelle recette<h2>
    <button class="bedit"  onclick="afficherFormulaire()">Ajouter une Recette</button>
    </div>
    <!-- Formulaire caché par défaut -->
   
    
    <script>
          const cancelButton = document.getElementById('cancel-button');
      // Fonction pour afficher le formulaire
      function afficherFormulaire() {
        document.getElementById('addrecette').style.display = 'block';
      
      }
      cancelButton.addEventListener('click', function() {
  addForm.style.display = 'none';
});


const cancelButtonNews = document.getElementById('buttonCancelNews');
      // Fonction pour afficher le formulaire
      function afficherNews() {
        document.getElementById('InsertNews').style.display = 'block';
      
      }
      cancelButtonNews.addEventListener('click', function() {
  addNews.style.display = 'none';
});


    </script>
    <form id ="addrecette"  classe='form' style="display:none;" method="POST" action="">
    
    <label for="titre">Titre de la recette</label><br>
    <input type="text" id="titre" name="titre" placeholder=""><br>
  
    <label for="descript">Description de la recette</label><br>
    <textarea id="descript" name="descript" placeholder=""></textarea><br>
  
    <label for="healthy">Healthy</label><br>
    <input type="text" id="healthy" name="healthy" placeholder=""><br>
  
    <label for="calories">Calories</label><br>
    <input type="number" id="calories" name="calories" placeholder=""><br>
  
    <label for="difficulte">Difficulté</label><br>
    <input type="text" id="difficulte" name="difficulte" placeholder=""><br>
  
    <label for="tempsCuisson">Temps de cuisson</label><br>
    <input type="text" id="tempsCuisson" name="tempsCuisson" placeholder=""><br>
  
    <label for="tempsRepos">Temps de repos</label><br>
    <input type="text" id="tempsRepos" name="tempsRepos" placeholder=""><br>
  
    <label for="tempsPreparation">Temps de préparation</label><br>
    <input type="text" id="tempsPreparation" name="tempsPreparation" placeholder=""><br>
  
    <label for="idUser">Utilisateur</label><br>
    <input type="hidden" id="idUser" name="idUser" placeholder=""><br><br><br>
  

   
    <button id="valider-add" name="Insert" onsubmit="<?php $controller=new adminController();$controller->InsertRecette();?>">Ajouter Recette</button>
    <button id="cancel-button">Annuler</button>

</form> 
  
        <Table class="tableau" id="Table1">
            <thead>
                <tr>
             

                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">healthy</th>
                    <th scope="col">Difficulte</th>
                    <th scope="col">CaloriesRecette</th>
                    <th scope="col">TempsCuisson</th>
                    <th scope="col">TempsRepos</th>
                    <th scope="col">TempsPreparation</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                

                $controller = new adminController();
                $controller->editRecette();
                $controller->deleteRecette();
                $res = $controller->getRecette();
                foreach ($res as $row) { ?>
                    <tr>
                        
                        <form method="POST" action="">
                            <input type="hidden" name="IdRecette" value="<?php echo $row['IdRecette'] ?>">
                            <th scope="row"><input type="text" name="Titre" value="<?php echo $row["Titre"] ?>"></th>
                            <td><input type="text" name="Descript" value="<?php echo $row["Descript"] ?>"></td>
                            <td><input type="Text" name="Healthy" value="<?php echo $row["Healthy"] ?>"></td>
                            <td><input type="Number" name="CaloriesRecette" value="<?php echo $row["CaloriesRecette"] ?>"></td>
                            <td><input type="Number" name="Difficulte" value="<?php echo $row["Difficulte"] ?>"></td>
                            <td><input type="Number" name="TempsCuisson" value="<?php echo $row["TempsCuisson"] ?>"></td>
                            <td><input type="Number" name="TempsRepos" value="<?php echo $row["TempsRepos"] ?>"></td>
                            <td><input type="Number" name="TempsPreparation" value="<?php echo $row["TempsPreparation"] ?>"></td>
                            <input type="hidden" name="IdUser" value="<?php echo $row['IdUser'] ?>">
                            <td><button  class="bedit" type="submit" name="form1">Edit</button></td>
                         <td><button class="bdelet" name="deleteform1" onsubmit="">Delete</button></td>

                        </form>
                    <tr>
                    <?php
                }
                    ?>
            </tbody>
        </Table>
        <br>
            </div>
    <?php
    }

    /************ */
    /************ */
    public function News()
    {
       

    ?>
    <div class="categorie">
        <h1>Gestion des News </h1>
    <!-- Bouton pour afficher le formulaire -->
    <div classe="ajout">
         <!-- Formulaire caché par défaut -->
   
    
   
    <h2>Ajouter News<h2>
    <button class="bedit"  onclick="afficherNews()">Ajouter une Recette</button>
    </div>
   
    <form id ="InsertNews" classe='form' style="display:none;" method="POST" action="">
    <label for="titre">idnews</label><br>
    <input type="text" id="idNews" name="IdNews" placeholder=""><br>
    <label for="titre">Titre d'Article'</label><br>
    <input type="text" id="titre" name="Titre" placeholder=""><br>
  
    <label for="descript">Article</label><br>
    <textarea id="acticle" name="Article" placeholder=""></textarea><br>
  
    <label for="healthy">Path d'image</label><br>
    <input type="text" id="pathI" name="PathI" placeholder=""><br>
  
    
  

   
    <button id="buttonAddNews" name="InsertNews" onclik="<?php $controller=new adminController();$controller->insertNews();?>">Ajouter News</button>
   
    <button id="buttnCancelNews">Annuler</button>

</form> 
  
        <Table class="tableau" id="Table2">
            <thead>
                <tr>
             

                    <th scope="col">Titre</th>
                    <th scope="col">Article</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $controller = new adminController();
                

                $controller = new adminController();

                 $controller->editNews();
               $controller->deleteNews();
                $res = $controller->getArticle();
                
                foreach ($res as $row) {
                     ?>
                    <tr>
                        
                        <form method="POST" action="">
                        
                            <input  type="hidden" name="IdNews" value="<?php echo $row['IdNews'] ?>">
                            <th scope="row"><input type="text" name="Titre" value="<?php echo $row["Titre"] ?>"></th>
                            <td><input type="text" name="Article" value="<?php echo $row["Article"] ?>"></td>
                            
                            <td><input type="text" name="PathI" value="<?php echo $row["PathI"] ?>"></td>
                            
                        
                           
                            <input type="hidden" name="PathN" value="<?php echo $row["PathI"] ?>">
                            <td><button  class="bedit" type="submit" name="formNews">Edit</button></td>
                        <td><button  class="bdelet" name="deleteform2" onclick="">Delete</button></td>

                        </form>
                    <tr>
                    <?php
                }
                    ?>
            </tbody>
        </Table>
        <br>
            </div>
    <?php
    }
     /***************************** */

     public function Nutrition()
    {
       

    ?>
    <div class="categorie">
        <h1>Gestion des News </h1>
    <!-- Bouton pour afficher le formulaire -->
    <div classe="ajout">
         <!-- Formulaire caché par défaut -->
   
    
   
    <h2>Ajouter News<h2>
    <button class="bedit"  onclick="afficherNews()">Ajouter une Recette</button>
    </div>
   
    <form id ="InsertNews" classe='form' style="display:none;" method="POST" action="">
    <label for="titre">idnews</label><br>
    <input type="text" id="idNews" name="IdNews" placeholder=""><br>
    <label for="titre">Titre d'Article'</label><br>
    <input type="text" id="titre" name="Titre" placeholder=""><br>
  
    <label for="descript">Article</label><br>
    <textarea id="acticle" name="Article" placeholder=""></textarea><br>
  
    <label for="healthy">Path d'image</label><br>
    <input type="text" id="pathI" name="PathI" placeholder=""><br>
  
    
  

   
    <button id="buttonAddNews" name="InsertNutrition" onclik="<?php $controller=new adminController();$controller->insertNews();?>">Ajouter News</button>
   
    <button id="buttnCancelNews">Annuler</button>

</form> 
  
        <Table class="tableau" id="Table2">
            <thead>
                <tr>
             

                    <th scope="col">Titre</th>
                    <th scope="col">Article</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $controller = new adminController();
                

                $controller = new adminController();

                 $controller->editNews();
               $controller->deleteNews();
                $res = $controller->getArticle();
                
                foreach ($res as $row) {
                     ?>
                    <tr>
                        
                        <form method="POST" action="">
                        
                            <input  type="hidden" name="IdNews" value="<?php echo $row['IdNews'] ?>">
                            <th scope="row"><input type="text" name="Titre" value="<?php echo $row["Titre"] ?>"></th>
                            <td><input type="text" name="Article" value="<?php echo $row["Article"] ?>"></td>
                            
                            <td><input type="text" name="PathI" value="<?php echo $row["PathI"] ?>"></td>
                            
                        
                           
                            <input type="hidden" name="PathN" value="<?php echo $row["PathI"] ?>">
                            <td><button  class="bedit" type="submit" name="formNews">Edit</button></td>
                        <td><button  class="bdelet" name="deleteform2" onclick="">Delete</button></td>

                        </form>
                    <tr>
                    <?php
                }
                    ?>
            </tbody>
        </Table>
        <br>
            </div>
    <?php


        ?>
      
    
    <div class="categorie">
        <h1>Gestion de Nutrition  <i class="fas fa-utensils table-icon"></i></h1>
        <table  class="tableau" id="Table2">
        <tr>
        <th>Ingredient</th>
        <th>Calories</th>
        <th>Nutrition</th>
         
          <th>Quantite</th>
          <th>Healthy</th>
          <th>Season</th>
          <th>edit</th>
          <th>delete</th>
          </thead>
            <tbody>
        
        <?php 
       
        $controller = new adminController();
       
        $controller->deleteIngredient();
        $controller->editIngredients();
       
        $ingredients = $controller-> getIngredient();
                
        foreach ($ingredients as $ingredient) {
      
          $nutritions= $controller-> getNutrition($ingredient['IdIngredients']);
        
          

               
               
          ?>
      
      <tr>
      <form method="POST" action="">
        
           
        <input  type="hidden" name="IdIngredients" value="<?php echo $ingredient['IdIngredients']  ?>">
            <td>
          
            <input  type="text" name="NomIngredient" value="<?php echo $ingredient['NomIngredient']  ?>">
            <br>
            <br> 
            <input  type="text" name="PathI" value="<?php echo $ingredient['PathI']?>">
        </td>

        <td>
              
              <input  type="Number" name="CaloriesIngredient" value="<?php echo $ingredient['CaloriesIngredient']  ?>">
             
          </td>
        <td>
            
        <?php 
         $nutritions_names = array();
         $nutritions_Id =array();
        foreach ($nutritions as $nutrition) {
           // $n=$nutrition['NomNutrition'];
         //   $nutritions_names[] = $n;
           // $nutritions_Id[] = $nutrition['IdNutrition'];
           
       
          ?>
       
         <input  type="text" name="nomNutrition" value="<?php echo $nutrition['NomNutrition']; ?>">
         <input  type="text" name="idNutrition" value="<?php echo $nutrition['IdNutrition']; ?>">
         
         
         <br>
         
         
          
          <?php }
        
       
       ?>
     
         
         <!-- <input type="hidden" name="NameNutrition" value="<?php //echo implode(',', $nutritions_names); ?>"> -->
         <!-- <input type="hidden" name="IDNutrition" value="<?php //echo implode(',', $nutritions_Id); ?>"> -->
         

         </td>
        
        <!-- <td > <input  type="text" name="CaloriesIngredien" value="<?php echo $ingredient['CaloriesIngredien']?>"></td> -->
          
        <td >
          <?php 
           $nut= $controller-> getNutrition($ingredient['IdIngredients']);
          
           foreach ($nut as $n) {
       
       ?>
      
      
       <input  type="Number" name="quant" value="<?php echo $n['quant']  ?>"> <br>
       <?php }
    
    ?>
          
          </td>
          <td > <input  type="text" name="IsHealthy" value="<?php echo $ingredient['IsHealthy']  ?>"></td>
          <td > <input  type="text" name="NomSaison" value="<?php echo $ingredient['NomSaison']  ?>"></td>
          
          
                            <td><button  class="bedit" type="submit" name="formIngredient">Edit</button></td>
                        <td><button  class="bdelet" name="deleteform3" onclick="">Delete</button></td>

                        </form>
           </tr>
                    <?php
                }
                    ?>
            </tbody>
        </Table>
        <br>
            </div>
    <?php }

     /***************************** */
    public function display()
    {
        $this->header();
       
        $this->Recette();
        $this->News();
        $this->Nutrition();
       
        
    }
    /***************************** */
}

?>