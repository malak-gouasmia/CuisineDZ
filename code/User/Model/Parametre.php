<?php
require_once "Bdd.php";
class Parametre{
    private $db;

    public function get_diaporama($id){
        $this->db = new BddUser();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM image_diaporama WHERE IdDiaporama=$id");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }


   

    public function get_menu(){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $stmt = $cnx->prepare("SELECT * FROM menu");
    $stmt->execute();
    $this->db->deconnexion($cnx);
    return $stmt;
}


public function get_sous_menu(){
    $this->db = new Bdd();
    $cnx = $this->db->connexion();
    $stmt = $cnx->prepare("SELECT * FROM sous_menu");
    $stmt->execute();
    $this->db->deconnexion($cnx);
    return $stmt;
}
}
?>