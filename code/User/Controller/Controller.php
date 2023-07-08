<?php


require_once 'E:/App/wamp/www/Code/User/Model/Recette.php';
require_once 'E:/App/wamp/www/Code/User/Model/Parametre.php';
require_once($_SERVER['DOCUMENT_ROOT'].'./code/User/View/Accueil.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/User/View/Login.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/User/View/ParCategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./code/User/View/DetailsRecette.php');
 /***************************** */

    class UserController{

/*______________________________________________________________________________________________________________________*/    
   
    

/*____________________________________________________________________________________________________________________________*/
       
       
public function Login(){
    // Si le formulaire de login a été soumis
    if(isset($_POST["loginUser"])){
        // Récupération et nettoyage des données du formulaire
        $mail= strip_tags(trim($_POST['mail']));
        $password= strip_tags(trim($_POST['password']));

        // Connexion à la base de données et vérification des identifiants
        $model=new BddUser();
        $res=$model->login($mail,$password);

        // Si la session n'a pas encore été démarrée, on la démarre
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Suppression des données du formulaire
        unset($_POST);

        // Si les identifiants sont corrects, on enregistre l'utilisateur en session et on recharge la page
        if($res>0){
            $_SESSION["mail"]=$mail;
            header("Refresh:0"); 
        }
        // Sinon, on retourne le résultat (0 ou 1)
        return $res;    
    }
}



/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données de toutes les recettes 
        #en appelant la fonction getRecette() de la classe GestionRecette.
        public function getRecette(){
            $model=new Recette();
            $result=$model->getRecette();
            return $result;
        }
/*_______________________________________________________________________________________________________________________________________*/

public function getRecettebyCategory($catego){
    $model=new Recette();
    $result=$model->getRecettebyCategory($catego);
    return $result;
}

/*______________________________________________________*/
public function getRecettebyId($Id){
    $model=new Recette();
    $result=$model->getRecettebyId($Id);
    return $result;
}

/*____________________________________*/
public function getNutrition($id){   
    $model=new Recette();
    $result=$model-> getNutrition($id);
    return $result;
}
public function getIngredient(){   
    $model=new Recette();
    $result=$model-> getIngredient();
    return $result;
}


/*______________________________________________________*/
public function getIngredientbyidRecette($id){
    $model=new Recette();
    $result=$model->getIngredientbyidRecette($id);
    return $result;
}

/*________________________________________________________________________________________________________________________*/

/*______________________________________________________*/
public function  getEtapebyidRecette($id){
    $model=new Recette();
    $result=$model-> getEtapebyidRecette($id);
    return $result;
}

/*________________________________________________________________________________________________________________________*/

public function getRecetteFete($Fete){
    $model=new Recette();
    $result=$model-> getRecetteFete($Fete);
    return $result;
}
/*______________________________________________________*/

public function getFete(){
    $model=new Recette();
    $result=$model-> getFete();
    return $result;
}

/*______________________________________________________*/

public function getSaison(){
    $model=new Recette();
    $result=$model-> getSaison();
    return $result;
}

/*______________________________________________________*/

public function getSaisonIngredient(){
    $model=new Recette();
    $result=$model-> getSaisonIngredient();
    return $result;
}
/*______________________________________________________*/


public function getSaisonRecette($id){
    

    $RecetteModel = new Recette();
   
   
        
    $ingredients=$RecetteModel-> getSaisonIngredient($id);
      
    // Calculer les calories de la recette
    $cptEte = 0;
    $cptHiver = 0;
    $cptAutomne= 0;
    $cptPrintemps = 0;
    
    $max=0;
    foreach ($ingredients as $ingredient) {
        switch ($ingredient['NomSaison']) {
            case 'Ete':
                $cptEte += 1;
                break;
            case 'Hiver':
                $cptHiver += 1;
                break;
            case 'Automne':
                $cptAutomne += 1;
                break;
            case 'Printemps':
                $cptPrintemps += 1;
                 break;

        }
    }
    $max=max($cptEte, $cptHiver, $cptPrintemps, $cptAutomne);
    if($max == 0) {
       $saisons=null;
     
    }
    else{ 
        $saisons = array();
       
if($cptEte == $max) {
    array_push($saisons, 'Ete');

   
    //$saisons[] = 'Ete';
}
if($cptHiver == $max) {
    array_push($saisons, 'Hiver' );
   
    //$saisons[] = 'Hiver';
}
if($cptAutomne == $max) {
    array_push($saisons, 'Automne' );

    //$saisons[] = 'Automne';
}
if($cptPrintemps == $max) {
    array_push($saisons, 'Printemps');
   
    //$saisons[] = 'Printemps';
}}

return $saisons;



  

}
/*______________________________________________________*/
public function  getNewsRecette(){
    $model=new Recette();
    $result=$model-> getNewsRecette();
    return $result;
}
/*______________________________________________________*/
/*______________________________________________________*/
public function  getArticleById($Id){
    $model=new Recette();
    $result=$model-> getArticleById($Id);
    return $result;
}
/*______________________________________________________*/

public function  getArticle(){
    $model=new Recette();
    $result=$model-> getArticle();
    return $result;
}
/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=plat
        #en appelant la fonction getRecetteEntree() de la classe GestionRecette.
        public function getPlat(){
            $model=new Recette();
            $result=$model->platModel();
            return $result;
        }
/*_______________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=entree
        #en appelant la fonction getRecetteEntree() de la classe GestionRecette.
        public function getEntree(){
            $model=new Recette();
            $result=$model->getRecetteEntree();
            return $result;
        }
/*_______________________________________________________________________________________*/


/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=dessert
        #en appelant la fonction getRecetteDessert() de la classe GestionRecette.
        public function getDessert(){
            $model=new Recette();
            $result=$model->getRecetteDessert();
            return $result;
        }
/*_______________________________________________________________________________________*/

public function get_diaporama($id){
    $model=new Parametre();
    $result=$model->get_diaporama($id);
    return $result;
}
/*________________________________________________________________________________________________________________________*/
        #permet de récupérer les données des recettes dont categorie=boisson
        #en appelant la fonction getRecetteBoisson() de la classe GestionRecette.
        public function getBoisson(){
            $model=new Recette();
            $result=$model->getRecetteBoisson();
            return $result;
        }

/*_____________________________________________________________________________________________________________________________*/
         #permet de supprimer une recette de la base de données en récupérant son identifiant à partir de la variable $_POST 
         #et en appelant la fonction deleteRecette() de la classe GestionRecette.
        public function deleteRecette(){
            if(isset($_POST['deleteform1'])){
                $id=$_POST['IdRecette'];
                $model=new Recette();
                $model->deleteRecette($id);
                unset($_POST);
               
            }
        }
/*_______________________________________________________________________________________________________________________________*/


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
                $model=new Recette();
                $model->editRecette($idRecette,$titre,$Descript ,$healthy,$Calories,$Difficulte,$TempsCuisson,$TempsRepos,$TempsPreparation,$idUser);
                unset($_POST);
                header("Refresh:0");
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
       
        $model=new Recette();
        $res=$model->insertRecette ($idRecette,$titre,$Descript ,$healthy,$Calories,$Difficulte,$TempsCuisson,$TempsRepos,$TempsPreparation,$idUser);
        unset($_POST);
        
        return $res;
        header("Refresh:0");
    }
    return false;
    
}    
/*___________________*/
      
public function Signupuser(){
    if(isset($_POST['AddUser'])){

        
       
        $nom = strip_tags(trim($_POST['Nom'])); 
        $prenom       =strip_tags($_POST['Prenom']);
        $sexe  =strip_tags(trim($_POST['Sexe']));
        $mail     =strip_tags(trim($_POST['Mail']));
        $Date    =strip_tags(trim($_POST['DateNaissance']));
        $motPass     =strip_tags(trim($_POST['MotPasse']));
          
        
        $nom = 'aa'; 
        $prenom       ='aa';
        $sexe  ='aaa';
        $mail     ='aaa';
        $Date    ='aaa';
        $motPass     ='aaa';
        $model=new Recette();
        
        $res=$model->adduser($nom,$prenom ,$sexe,$mail,$Date,$motPass);
        unset($_POST);
        
        return $res;
        
    }
    return false;
    
}  
/*
public function checkCalories($IdRecette, $calorieThreshold) {
    $RecetteModel = new Recette();
    $Recette     = $RecetteModel->getRecettebyId($IdRecette);
    $ingredients = $RecetteModel->getIngredientbyidRecette($IdRecette);

    // Calculer les calories de la recette
    $calories = 0;
    foreach ($ingredients as $ingredient) {
      $calories += $ingredient['CaloriesIngredient'];
    }

    // Modifier l'attribut "healthy" de la recette en fonction du seuil de calories
    if ($calories > $calorieThreshold) {
      $RecetteModel->updateHealth($IdRecette,'not healthy');
    } else {
      $RecetteModel->updateHealth($IdRecette,'healthy');
    }
  }*/
// ...

public function checkCalories( $calorieThreshold) {
    $RecetteModel = new Recette();
    $Recettes     = $RecetteModel->getRecette();
   
    foreach ($Recettes as $Recette) {
        $ingredients = $RecetteModel->getIngredientbyidRecette($Recette['IdRecette']);
    // Calculer les calories de la recette
    $calories = 0;
    foreach ($ingredients as $ingredient) {
      $calories += $ingredient['CaloriesIngredient'];
    }

    // Modifier l'attribut "healthy" de la recette en fonction du seuil de calories
    if ($calories > $calorieThreshold) {
      $RecetteModel->updateHealth($Recette['IdRecette'],'not healthy');
    } else {
      $RecetteModel->updateHealth($Recette['IdRecette'],'healthy');
    }}}

    /*_____________________________________________________________________*/

    
public function checkSaison( $calorieThreshold) {
    $RecetteModel = new Recette();
    $Recettes     = $RecetteModel->getRecette();
   
    foreach ($Recettes as $Recette) {
        $ingredients = $RecetteModel->getIngredientbyidRecette($Recette['IdRecette']);
    // Calculer les calories de la recette
    $calories = 0;
    foreach ($ingredients as $ingredient) {
      $calories += $ingredient['CaloriesIngredient'];
    }

    // Modifier l'attribut "healthy" de la recette en fonction du seuil de calories
    if ($calories > $calorieThreshold) {
      $RecetteModel->updateHealth($Recette['IdRecette'],'not healthy');
    } else {
      $RecetteModel->updateHealth($Recette['IdRecette'],'healthy');
    }}}

    /*_____________________________________________________________________*/
    public function getHealthyRecette($calorieThreshold) {
        $RecetteModel = new Recette();


       
        $Recettes = $RecetteModel->getRecette();
        
            $this->checkCalories( $calorieThreshold) ;
         
        
        $healthyRecette = $RecetteModel->getHealthyRecette();
        return $healthyRecette;
    }
    // ...



/*_______________________________________________________________________________________________________________________*/

         #Cette fonction affiche la vue correspondante en fonction de l'état de la session
         #Si la session est ouverte, elle affiche la vue dashboard, sinon elle affiche la vue de login
        public function display(){


            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
                // Si la variable de session 'mail' est définie, on affiche la vue homepage
            if(isset($_SESSION['mail'])){
                $view=new HomePage();
                $view->display();
                
             // Sinon, on affiche la vue de login
            }else{
                echo 'voues ete pas athentifier'; 
                echo 'voues ete pas athentifier'; 
                
              
            }
          
               
             // Sinon, on affiche la vue de login
           
        }
 /*________________________________________________________________________________________________________________________*/
 
    }   