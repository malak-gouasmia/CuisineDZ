
    <?php
require_once "Bdd.php";

class GestionNews{
private $db;

public function getArticle(){   
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT * FROM  news news JOIN image_news ON news.IdNews = image_news.IdNews   " ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
}
/*____________________________________________________________*/
public function getArticleById($Id){   
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="SELECT * FROM  news news JOIN image_news ON news.IdNews = image_news.IdNews WHERE news.IdNews=$Id   " ;
    $result=$this->db->requete($cnx,$query);
    $this->db->deconnexion($cnx);
    return $result;
}

 /*____________________________________________________________________________________________________________________________*/




#
public function editNews($IdNews,$Titre,$Article,$PathI){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query='UPDATE News SET Titre=:titre, Article=:article WHERE idNews=:IdNews';
     $result=$cnx->prepare($query);
     $result->execute(array(':IdNews' => $IdNews,':titre' => $Titre, ':article' => $Article));
    $this->db->deconnexion($cnx);
    return $result;
}
public function editImage($PathI,$PathN){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query='UPDATE image SET PathI=:new WHERE pathI=:PathI';
     $result=$cnx->prepare($query);
     $result->execute(array(':new' => $PathN,':PathI' => $PathI));
    $this->db->deconnexion($cnx);
    return $result;
}
public function editImageArticle($Id,$PathI){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query='UPDATE image_news SET PathI=:pathI  WHERE idNews=:IdNews';
     $result=$cnx->prepare($query);
     $result->execute(array(':IdNews' => $Id,':pathI' => $PathI));
    $this->db->deconnexion($cnx);
    return $result;
}




public function deleteNews($id){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $query="DELETE FROM News WHERE IdNews=?";
    
    $result=$cnx->prepare($query);
    $result->execute(array($id));
    $this->db->deconnexion($cnx);
    return $result;
}



public function insertNews($IdNews,$Titre,$Article ){
    $this->db = new Bdd();
   $cnx = $this->db->connexion();
   $query1="INSERT INTO news (IdNews,Titre,Article) VALUES(?,?,?)";
   $result=$cnx->prepare($query1);
   $result->execute(array($IdNews,$Titre,$Article));
   
   

  

  

   $this->db->deconnexion($cnx);
   return $result;
}


public function insertImageNews($IdNews,$PathI ){
    $this->db = new Bdd();
   $cnx = $this->db->connexion();
  
   
   

   $query="INSERT INTO image_news (IdNews,PathI) VALUES(?,?)";
   $result=$cnx->prepare($query);
   $result->execute(array($IdNews,$PathI ));

  

   $this->db->deconnexion($cnx);
   return $result;
}

}

?>