
    <?php
require_once "Bdd.php";

class GestionNutrition{
private $db;

public function getNutrition($id){   
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT n.IdNutrition, n.NomNutrition, an.quant
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
    $this->db = new Bdd();
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

public function deleteIngredient($id){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="DELETE FROM Ingredient WHERE IdIngredients=?";
    
    $result=$cnx->prepare($query);
    $result->execute(array($id));
    $this->db->deconnexion($cnx);
    return $result;
}

public function editIngredient($IdIngredients,$NomIngredient,$CaloriesIngredient,$isHealthy){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query='UPDATE Ingredient SET   NomIngredient=:nom, 
                                    CaloriesIngredient=:calorie,
                                    isHealthy=:healthy
                                    WHERE IdIngredients=:IdIngredients';
     $result=$cnx->prepare($query);
     $result->execute(array(':IdIngredients' => $IdIngredients,':nom' => $NomIngredient, ':calorie' =>$CaloriesIngredient, ':healthy' => $isHealthy));
    $this->db->deconnexion($cnx);
    return $result;
}


public function editSaisonIngredient($IdIngredients,$saison){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query='UPDATE durant_saison SET  
                                   NomSaison=:nom
                                  
                                    WHERE idIngredients=:IdIngredients';
     $result=$cnx->prepare($query);
     $result->execute(array(':IdIngredients' => $IdIngredients,':nom' => $saison));
    $this->db->deconnexion($cnx);
    return $result;
}

public function editNutrition( $IdNutrition,$NomNutrition){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $grm=0;
    $query='UPDATE nutrition SET  
                                   NomNutrition=:nom,
                                   Gramme=:grm
                                    WHERE idNutrition=:IdNutrition';
     $result=$cnx->prepare($query);
     $result->execute(array(':IdNutrition' => $IdNutrition,':nom' => $NomNutrition,':grm' => $grm));
    $this->db->deconnexion($cnx);
    return $result;
}


}

?>