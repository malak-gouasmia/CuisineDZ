<?php

 
// Cette classe permet de gérer les connexions et les requêtes à la base de données

class Bdd {

   // Déclaration des variables de connexion à la base de données
   private $DB_host = "localhost";
   private $DB_user = "root";
   private $DB_pass = "";
   private $DB_name = "tdw";
   private $db;
   



/*_______________________________________________________________________________________________________________________*/
   // Méthode de connexion à la base de données
   public function connexion() {
      try {
         // Création de l'objet PDO pour la connexion à la base de données
         $DB = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name}", $this->DB_user, $this->DB_pass);
         // Configuration de l'objet PDO pour gérer les erreurs de connexion
         $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
         // Affichage d'un message d'erreur en cas de problème de connexion
         printf("Erreur lors de la connexion à la base de données");
         exit();
      }
    
      // Retour de l'objet PDO créé
      return $DB;
   }
/*________________________________________________________________________________________________________________________*/



/*________________________________________________________________________________________________________________________*/
 // Méthode de déconnexion de la base de données
   public function deconnexion(&$db) {
      // Fermeture de l'objet PDO
      $db = null;
   }
/*_________________________________________________________________________________________________________________________________*/

/*_______________________________________________________________________________________________________________________-________*/
   // Méthode pour exécuter une requête SQL
   public function requete($db, $r) {
      return $db->query($r);
   }

 /*__________________________________________________________________________________________________________________________________*/




 /*_____________________________________________________________________________________________________________________*/
  // Méthode d'authentification pour l'admin
 public function login($username,$password){
            # Création de la connexion à la base de données
        $cnx = $this->connexion();
        
            # Requête SQL pour vérifier si l'utilisateur existe dans la table "admin"
        $query="SELECT * FROM admin WHERE UserName=? AND Pass=?";
        
            # Préparation de la requête
        $res=$cnx->prepare($query);
        
         # Exécution de la requête en passant les valeurs de l'utilisateur en paramètre
        $res->execute(array($username,$password));
        
         # Récupération du résultat de la requête
        $count=$res->fetch(PDO::FETCH_OBJ);
        
         # Fermeture de la connexion à la base de données
        $this->deconnexion($cnx);
        
         # Retour du résultat de la requête
        return $count;
    }

/*______________________________________________________________________________________________________________________________________________*/
   
    
}
 

?>