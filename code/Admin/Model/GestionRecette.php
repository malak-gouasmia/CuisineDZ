<?php
require_once "Bdd.php";

class GestionRecette{
private $db;
/*____________________________________________________________________________________________________________________________*/
#permet de récupérer les données de toutes les recettes    
    public function getRecette(){
        $this->db = new Bdd();
        $cnx = $this->db->connexion();
        $query="SELECT * FROM recette";
        $result=$this->db->requete($cnx,$query);
        $this->db->deconnexion($cnx);
        return $result;
    }
/*____________________________________________________________________________________________________________________________*/

#permet de récupérer les données  les recettes  dont la categorie = plat  
public function getRecettePlat(){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT * FROM recette WHERE catego='plate' " ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
}
/*____________________________________________________________________________________________________________________________*/

#permet de récupérer les données  les recettes  dont la categorie = entree
public function getRecetteEntree(){   
$this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT * FROM recette WHERE catego='entree' " ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
}
/*____________________________________________________________________________________________________________________________*/

#permet de récupérer les données  les recettes  dont la categorie = dessert
public function getRecetteDessert(){   
$this->db = new Bdd();
$cnx = $this->db->connexion();
$query="SELECT * FROM recette WHERE catego='dessert' " ;
$result=$this->db->requete($cnx,$query);
$this->db->deconnexion($cnx);
return $result;
}
/*____________________________________________________________________________________________________________________________*/

#permet de récupérer les données  les recettes  dont la categorie = Boisson
public function getRecetteBoisson(){   
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT * FROM recette WHERE catego='boisson' " ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
    }
    /*____________________________________________________________________________________________________________________________*/
    
/*____________________________________________________________________________________________________________________________*/
 #permet de supprimer une recette de la base de données en récupérant son identifiant 
    public function deleteRecette($id){
        $this->db = new Bdd();
        $cnx = $this->db->connexion();
        $query="DELETE FROM recette WHERE IdRecette=?";
        
        $result=$cnx->prepare($query);
        $result->execute(array($id));
        $this->db->deconnexion($cnx);
        return $result;
    }
/*____________________________________________________________________________________________________________________________*/


/*____________________________________________________________________________________________________________________________*/
    #cete fonction permet d'ajouter  une recette a la base de données
    public function insertRecette($IdRecette,$Titre,$descript,$healthy,$CaloriesRecette,$Difficulté,$TempsCuisson,$TempsRepos,$TempsPreparation,$IdUser ){
         $this->db = new Bdd();
        $cnx = $this->db->connexion();
        $query="INSERT INTO recette (IdRecette,Titre,Descript,healthy,CaloriesRecette,Difficulte,TempsCuisson,TempsRepos,TempsPreparation,IdUser) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $result=$cnx->prepare($query);
        $result->execute(array($IdRecette,$Titre,$descript,$healthy,$CaloriesRecette,$Difficulté,$TempsCuisson,$TempsRepos,$TempsPreparation,$IdUser ));
        $this->db->deconnexion($cnx);
        return $result;
    }
/*____________________________________________________________________________________________________________________________*/

/*____________________________________________________________________________________________________________________________*/
#cette fonction permet de modifier une recette de la base de données
    public function editRecette($idRecette,$titre,$descript,$healthy,$calories,$difficulte,$tempsCuisson,$tempsRepos,$tempsPreparation,$idUser){
        $this->db = new Bdd();
        $cnx = $this->db->connexion();
       
                 #UPDATE recette SET Titre = ?, Descript = ?, Healthy = ?, CaloriesRecette = ?, Difficulte = ?, TempsCuisson = ?, TempsRepos = ?, TempsPreparation = ?, IdUser = ?WHERE IdRecette = ?
        # $query='UPDATE recette SET Titre=  ?, Descript=  ?, Healthy=  ?, CaloriesRecette=  ?, Difficulte=  ?, TempsCuisson=  ?, TempsRepos=  ?, TempsPreparation=  ?, IdUser= ? WHERE IdRecette=?';
        $query='UPDATE recette SET Titre=:titre, Descript=:descript,Healthy=:healthy,CaloriesRecette=:calories, Difficulte=:difficulte,TempsCuisson=:tempsCuisson,TempsRepos=:tempsRepos,TempsPreparation=:tempsPreparation, IdUser=:idUser WHERE idRecette=:IdRecette';
       
         $result=$cnx->prepare($query);
        
         $result->execute(array(':IdRecette' => $idRecette,':titre' => $titre, ':descript' => $descript, ':healthy' => $healthy,  ':calories' => $calories, ':difficulte' => $difficulte, ':tempsCuisson' => $tempsCuisson,':tempsRepos' => $tempsRepos, ':tempsPreparation' => $tempsPreparation,':idUser' => $idUser));
        
        # $result=$cnx->prepare($query);
       # $result->execute(array($idRecette,$Titre,$Descript,$healthy,$CaloriesRecette,$Difficulte,$TempsCuisson,$TempsRepos,$TempsPreparation,$idUser));
        $this->db->deconnexion($cnx);
        return $result;
    }
 /*____________________________________________________________________________________________________________________________*/

}

?>