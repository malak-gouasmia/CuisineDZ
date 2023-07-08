<?php

 
// Cette classe permet de gérer les connexions et les requêtes à la base de données

class BddUser {

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

 public function login($mail,$password){
          
        $cnx = $this->connexion();
        
           
        $query="SELECT * FROM users WHERE Mail=? AND MotPasse=?";
       
        $res=$cnx->prepare($query);
        
        
        $res->execute(array($mail,$password));
        
        
        $count=$res->fetch(PDO::FETCH_OBJ);
        
       
        $this->deconnexion($cnx);
        
   
        return $count;
    }

/*______________________________________________________________________________________________________________________________________________*/
   
    
}
 

?>