<?php

require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/Model/Bdd.php');

require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/Model/GestionRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/Model/GestionNews.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/Model/GestionNutrition.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/View/dashboard.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/Admin/View/login.php');
 /***************************** */

    class adminController{

/*______________________________________________________________________________________________________________________*/    
    #Fonction de login
    public function Login(){
       
        if(isset($_POST["login"])){
         
            $username= strip_tags(trim($_POST['username']));
            $password= strip_tags(trim($_POST['password']));

          
            $model=new bdd();
            $res=$model->login($username,$password);

        
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            unset($_POST);

           
            if($res>0){
                $_SESSION["username"]=$username;
                header("Refresh:0");   
            }
            // Sinon, on retourne le résultat (0 ou 1)
            return $res;    
        }
    }
/*_____________________________________________________________________________________________________________________*/


/*_____________________________________________________________________________________________________________________________*/
         #permet de déconnecter l'utilisateur en détruisant la session en cours 
         # en réinitialisant la variable $_POST.
        public function LogOut(){
            if(isset($_POST['logout'])){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                unset($_SESSION['username']);
                session_destroy();
                unset($_POST);
                header("Refresh:0");
            }
        }
/*___________________________________________________________________________________________________________________________*/

/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données de toutes les recettes 
        #en appelant la fonction getRecette() de la classe GestionRecette.
        public function getRecette(){
            $model=new GestionRecette();
            $result=$model->getRecette();
            return $result;
        }
/*_______________________________________________________________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=plat
        #en appelant la fonction getRecettePlat() de la classe GestionRecette.
        public function getRecettePlat(){
            $model=new GestionRecette();
            $result=$model->getRecettePlat();
            return $result;
        }
/*_______________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=entree
        #en appelant la fonction getRecetteEntree() de la classe GestionRecette.
        public function getRecetteEntree(){
            $model=new GestionRecette();
            $result=$model->getRecetteEntree();
            return $result;
        }
/*_______________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=dessert
        #en appelant la fonction getRecetteDessert() de la classe GestionRecette.
        public function getRecettedessert(){
            $model=new GestionRecette();
            $result=$model->getRecetteDessert();
            return $result;
        }
/*_______________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=boisson
        #en appelant la fonction getRecetteBoisson() de la classe GestionRecette.
        public function getRecetteBoisson(){
            $model=new GestionRecette();
            $result=$model->getRecetteBoisson();
            return $result;
        }

/*_____________________________________________________________________________________________________________________________*/
public function  getArticleById($Id){
    $model=new Recette();
    $result=$model-> getArticleById($Id);
    return $result;
}
/*______________________________________________________*/

public function  getArticle(){
    $model=new GestionNews();
    $result=$model-> getArticle();
    return $result;
}
/*_______________________________________________________________________________________________________________________________*/



  #permet de supprimer une recette de la base de données en récupérant son identifiant à partir de la variable $_POST 
         #et en appelant la fonction deleteRecette() de la classe GestionRecette.
         public function deleteRecette(){
            if(isset($_POST['deleteform1'])){
                $id=$_POST['IdRecette'];
                $model=new GestionRecette();
                $model->deleteRecette($id);
                unset($_POST);
               
            }
        }
/*___________________________________________________________________________________________________________________________________*/
              #cette fonction permet de modifier une recette de la base de données
        public function editRecette(){
            #Vérifie si le formulaire de modification de recette a été soumis
            if(isset($_POST['form1'])){
              #Récupère et stocke les données du formulaire dans des variables
              $idRecette =intval($_POST['IdRecette']);
              $titre           =strip_tags($_POST['Titre']);
              $Descript        =strip_tags(trim($_POST['Descript']));
              $healthy         =strip_tags(trim($_POST['Healthy']));
              $Calories        =doubleval($_POST['CaloriesRecette']);
              $Difficulte      =doubleval(trim($_POST['Difficulte']));
              $TempsCuisson    =doubleval(trim($_POST['TempsCuisson']));
              $TempsRepos      =doubleval(trim($_POST['TempsRepos']));
              $TempsPreparation=doubleval(trim($_POST['TempsPreparation']));
              $idUser          =intval($_POST['IdUser']);
             #Crée une instance de la classe GestionRecette et utilise sa fonction editRecette 
             #pour mettre à jour la recette dans la base de données
              $model=new GestionRecette();
              $model->editRecette($idRecette,$titre,$Descript ,$healthy,$Calories,$Difficulte,$TempsCuisson,$TempsRepos,$TempsPreparation,$idUser);
              unset($_POST);
             //header("Refresh:0");
          }
          
      
        }
/*____________________________________________________________________________________________________________________________*/
       
       
public function insertRecette(){
    if(isset($_POST['Insert'])){

        $idRecette      =intval($_POST['idRecette']);
        $titre           =strip_tags($_POST['titre']);
        $Descript        =strip_tags(trim($_POST['descript']));
        $healthy         =strip_tags(trim($_POST['healthy']));
        $Calories        =doubleval($_POST['calories']);
        $Difficulte      =doubleval(trim($_POST['difficulte']));
        $TempsCuisson    =doubleval(trim($_POST['tempsCuisson']));
        $TempsRepos      =doubleval(trim($_POST['tempsRepos']));
        $TempsPreparation=doubleval(trim($_POST['tempsPreparation']));
        $idUser          =intval($_POST['idUser']);
       
        $model=new GestionRecette();
        $res=$model->insertRecette ($idRecette,$titre,$Descript ,$healthy,$Calories,$Difficulte,$TempsCuisson,$TempsRepos,$TempsPreparation,$idUser);
        unset($_POST);
        
        return $res;
        header("location: /Code/Admin/View/dashbord.php");
    }
    return false;
    
}   

public function editNews(){
    #Vérifie si le formulaire de modification de recette a été soumis
    if(isset($_POST['formNews'])){
      #Récupère et stocke les données du formulaire dans des variables
      $idNews =intval($_POST['IdNews']);
      $titre           =strip_tags($_POST['Titre']);
      $article      =strip_tags(trim($_POST['Article']));
      $pathI       =strip_tags(trim($_POST['PathI']));
      $pathN       =strip_tags(trim($_POST['PathN']));
     
     #Crée une instance de la classe GestionRecette et utilise sa fonction editRecette 
     #pour mettre à jour la recette dans la base de données
      $model=new GestionNews();
      $model->editNews($idNews,$titre,$article ,$pathI);
      $model->editImage($pathI,$pathN);
      $model->editImageArticle($idNews,$pathI);

     
      unset($_POST);
      //header("Refresh:0");
  }
  
}

public function getNews(){
    $model=new GestionNews();
    $result=$model->getNews();
    return $result;
}


public function deleteNews(){
    if(isset($_POST['deleteform2'])){
        $id=$_POST['IdNews'];
        $model=new GestionNews();
        $model->deleteNews($id);
        unset($_POST);
       
    }

}

    
public function insertNews(){
    if(isset($_POST['InsertNews'])){

        $IdNews     =intval($_POST['IdNews']);
        $Titre           =strip_tags($_POST['Titre']);
        $Article     =strip_tags(trim($_POST['Article']));
        $PathI=strip_tags($_POST['PathI']);
       
        $model=new GestionNews();
        $res=$model->insertNews($IdNews,$Titre,$Article,$PathI );
        $res2=$model->insertImageNews($IdNews,$PathI );

        
        unset($_POST);
        
        return $res;
       
    }
    return false;
    
}   

/*_______________________________________________________________________________________________________________________*/

         #Cette fonction affiche la vue correspondante en fonction de l'état de la session
         #Si la session est ouverte, elle affiche la vue dashboard, sinon elle affiche la vue de login
        public function display(){
            // On vérifie l'état de la session avant de l'ouvrir
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
                // Si la variable de session 'username' est définie, on affiche la vue dashboard
            if(isset($_SESSION['username'])){
                $view=new dashboardView();
                $view->display();
             // Sinon, on affiche la vue de login
            }else{
                $view=new loginView();
                $view->display();
            }
        }



        public function getNutrition($id){   
            $model=new GestionNutrition();
            $result=$model-> getNutrition($id);
            return $result;
        }
        public function getIngredient(){   
            $model=new GestionNutrition();
            $result=$model-> getIngredient();
            return $result;
        }
        

        public function deleteIngredient(){
            if(isset($_POST['deleteform3'])){
                $id=$_POST['IdIngredients'];
                $model=new GestionNutrition();
                $model->deleteIngredient($id);
                unset($_POST);
               
            }
        }



        public function editIngredients(){
            #Vérifie si le formulaire de modification a été soumis
            if(isset($_POST['formIngredient'])){
              #Récupère et stocke les données du formulaire dans des variables
              $IdIngredients=intval($_POST['IdIngredients']);
              $NomIngredient      =strip_tags($_POST['NomIngredient']);
              $CaloriesIngredient     =doubleval($_POST['CaloriesIngredient']);
              $isHealthy    =strip_tags(trim($_POST['IsHealthy']));
              $saison   =strip_tags(trim($_POST['NomSaison']));
             // $NomNutrition=strip_tags($_POST['NomNutrition']);
              //$IdNutrition=intval($_POST['IdNutrition']);

             // $nutritions_names = explode(',', $_POST['NameNutrition']);
              //$nutritions_Id= explode(',', $_POST['IDNutrition']);

              $model=new GestionNutrition();
             
            
              $model-> editIngredient($IdIngredients,$NomIngredient,$CaloriesIngredient,$isHealthy);
              $model->editSaisonIngredient($IdIngredients,$saison);
              $i=1;
             // $model->editNutrition($nutritions_Id, $NomNutrition);
             /*foreach ($nutritions_names as $name ) {
              echo $name;
               
             $model->editNutrition($i,$name);
             $i=$i+1;
             
              }
              //$model->editNutrition(1,$NomNutrition);
              /*foreach (array_map(null, $nutritions_names, $nutritions_Id) as list($name, $id)) {
                $model->editNutrition(intval($id), $name);
                
            }*/
            
              unset($_POST);
              //header("Refresh:0");
          }
          
        }


        public function editn(){
            #Vérifie si le formulaire de modification a été soumis
            if(isset($_POST['formNut'])){
              #Récupère et stocke les données du formulaire dans des variables
             
             
             

              $names =strip_tags($_POST['NomNutrition']);
              $id =intval($_POST['IdNutrition']);
              
             

              $model=new GestionNutrition();
             
            
             
              $model->editNutrition($id,$name);
           
            
              unset($_POST);
              //header("Refresh:0");
          }
          
        }

 /*________________________________________________________________________________________________________________________*/
 
    }   