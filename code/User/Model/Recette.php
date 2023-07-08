<?php
require_once "Bdd.php";

class Recette{
private $db;
 /*____________________________________________________________*/
    public function getRecettebyCategory($catego){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM recette recette JOIN image ON recette.IdRecette = image.IdRecette  WHERE catego='$catego' ORDER BY recette.IdRecette " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getIngredientbyidRecette($id){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT ingredient.NomIngredient , ingredient.CaloriesIngredient
        FROM ingredient
        JOIN preparer_Avec ON ingredient.IdIngredients = preparer_Avec.IdIngredients
        WHERE preparer_Avec.IdRecette = $id " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*________________________________________________________________*/
  /*____________________________________________________________*/
  public function getEtapebyidRecette($id){   
    $this->db = new BddUser();
    $cnx = $this->db->connexion();
    $query="SELECT etape.IdEtape, etape.numero, etape.Description
    FROM suivre_etape
    JOIN etape ON suivre_etape.IdEtape = etape.IdEtape
    WHERE suivre_etape.IdRecette = $id
    ORDER BY etape.numero;" ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
}
/*________________________________________________________________*/

    public function getRecettebyId($Id){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM recette recette JOIN image ON recette.IdRecette = image.IdRecette  WHERE recette.IdRecette=$Id " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    
     /*____________________________________________________________*/
     public function getRecette(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM recette recette JOIN image ON recette.IdRecette = image.IdRecette  " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getFete(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM fete " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getSaison(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM saison " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
/*_______________________________________*/



    /*_________________*/
    public function getSaisonIngredient($id){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT *
        FROM ingredient
        JOIN preparer_Avec ON ingredient.IdIngredients = preparer_Avec.IdIngredients  JOIN durant_saison  ON Ingredient.IdIngredients=durant_saison.IdIngredients  WHERE preparer_Avec.IdRecette = $id ;" ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*_________________*/

    public function getRecetteFete($Fete){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query= " SELECT * FROM  recette recette  JOIN image ON recette.IdRecette = image.IdRecette
        JOIN plat_de_fete ON recette.IdRecette = plat_de_fete.IdRecette
WHERE plat_de_fete.NomFete = '$Fete'";

        
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getNewsRecette(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM recette recette JOIN image ON recette.IdRecette = image.IdRecette ORDER BY recette.IdRecette DESC  " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getNutrition($id){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT n.NomNutrition, an.quant
        FROM ingredient i
        JOIN avoir_nutrition an ON i.IdIngredients = an.IdIngredients
        JOIN nutrition n ON an.IdNutrition = n.IdNutrition
        WHERE i.IdIngredients = $id;
         " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
//SELECT ingredient.NomIngredient, image.PathI, nutrition.NomNutrition FROM ingredient JOIN image_ingredient ON ingredient.IdIngredients = image_ingredient.IdIngredients JOIN image ON image_ingredient.PathI = image.PathI JOIN avoir_nutrition ON ingredient.IdIngredients = avoir_nutrition.IdIngredients JOIN nutrition ON avoir_nutrition.IdNutrition = nutrition.IdNutrition
    
    /*____________________________________________________________*/
    public function getIngredient(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT i.*, ii.*, ds.NomSaison
        FROM ingredient i
        JOIN image_ingredient ii ON i.IdIngredients = ii.IdIngredients 
        JOIN durant_saison ds ON i.IdIngredients = ds.IdIngredients
        " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }

    /*___________________________________*/
    public function getArticle(){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM  news news JOIN image_news ON news.IdNews = image_news.IdNews   " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    /*____________________________________________________________*/
    public function getArticleById($Id){   
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM  news news JOIN image_news ON news.IdNews = image_news.IdNews WHERE news.IdNews=$Id   " ;
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
/*____________________________________________________________*/

/*____________________________________________________________*/

    public function updateHealth($id,$health)
    {
      $this->db = new BddUser();
      $cnx = $this->db->connexion();
      $query="UPDATE recette SET healthy = '$health' WHERE recette.IdRecette =$id ";
      $result=$this->db->requete($cnx,$query);
      $this->db->deconnexion($cnx);
  
    }

    
/*_____________________________________*/

    // ...
    public function getHealthyRecette() {
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $query = "SELECT * FROM recette recette JOIN image ON recette.IdRecette = image.IdRecette  WHERE healthy = 'healthy'";
        $result = $this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
    // ...



/*______________________________*/


/*____________________________________________________________________________________________________________________________*/
    #cete fonction permet d'ajouter  une recette a la base de données
    public function insertRecette($IdRecette,$Titre,$descript,$healthy,$CaloriesRecette,$Difficulté,$TempsCuisson,$TempsRepos,$TempsPreparation,$IdUser ){
         $this->db = new Bddser();
        $cnx = $this->db->connexion();
        $query="INSERT INTO recette (IdRecette,Titre,Descript,healthy,CaloriesRecette,Difficulte,TempsCuisson,TempsRepos,TempsPreparation,IdUser) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $result=$cnx->prepare($query);
        $result->execute(array($IdRecette,$Titre,$descript,$healthy,$CaloriesRecette,$Difficulté,$TempsCuisson,$TempsRepos,$TempsPreparation,$IdUser ));
        $this->db->deconnexion($cnx);
        return $result;
    }
/*____________________________________________________________________________________________________________________________*/

public function adduser($nom,$prenom ,$sexe,$mail,$Date,$motPass){
    $this->db = new Bddser();
   $cnx = $this->db->connexion();
   $query="INSERT INTO users (Nom,Prenom,Sexe,Mail,DateNaissance,MotPasse) VALUES (?, ?, ?, ?, ?, ?)";
   $result=$cnx->prepare($query);
   $result->execute(array($nom,$prenom ,$sexe,$mail,$Date,$motPass));
   $this->db->deconnexion($cnx);
   return $result;
}

}

?>