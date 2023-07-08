<?php

require_once "./Controller/Controller.php";
require_once "./View/Accueil.php";
require_once "./View/News.php";
require_once "./View/Article.php";
require_once "./View/Healthy.php";
require_once "./View/Saison.php";
require_once "./View/fete.php";
require_once "./View/Nutrition.php";
require_once "./View/IdeesRecettes.php";
require_once "./View/Contact.php";
require_once "./View/Login.php";
require_once "./View/Signup.php";


$page = isset($_GET['page']) ? $_GET['page'] : 'default_page';
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$idNews= isset($_GET['idNews']) ? $_GET['idNews'] : 1;
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 'plat';

$titre='Plats';

//$page = $_GET['page'];

switch ($page) {
    case 'acceuil':
        $view = new Accueil();
        $view->display();
        break;
    case 'catego':
        $view = new ParCategorie();
        switch ($categorie) {
            case 'plat':
                $titre="Plats";
                break;
            case 'boisson':
                $titre="Boissons";
                break;
            case 'dessert':
                $titre="Desserts";
                break;
            case 'entree':
                 $titre="Entrees";
                 break;

        }
        $view->display($categorie,$titre);
        break;
    case 'recette':
        $view = new DetailsRecette();
       
            $view->display($id);
        
       
        break;
    case 'news':
            $view = new News();
           
                $view->display();
            
           
            break;
        case 'fete':
                $view = new Fete();
               
                    $view->display();
                
               
                break;
    case 'article':
                $view = new Article($idNews);
               
                    $view->display($idNews);
                
               
                break;
              
    case 'healthy':
                 $view = new Healthy();
                   
                    $view->display();
                    
                   
                break;
    case 'saison':
        $view = new Saison();
                      
                $view->display();
                       
                      
                   break;
    case 'nutrition':
    
        $view = new Nutrition();
                                  
        $view->display();
        break;
        case 'idees':
    
            $view = new IdeesRecettes();
                                      
            $view->display();
            break;
            case 'contact':
    
                $view = new  Contact();
                                          
                $view->display();
                break;

                case 'login':
    
                    $view = new  LoginUser();
                                              
                    $view->display();
                    break;

                    case 'signup':
    
                        $view = new  Signup();
                                                  
                        $view->display();
                        break;
           
    default:
        $view = new Accueil();
        $view->display();
}
?>
