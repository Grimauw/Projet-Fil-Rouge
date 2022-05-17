<?php
require_once "connexion.php";

class ModelCategorie
{

  private $id;
  private $nom;

  public function __construct($id = null, $nom = null)
  {
    $this->id = $id;
    $this->nom = $nom;
  }

  
  public  function ajoutCategorie($nom)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO categorie VALUES (null, :nom)
    ");
    return $requete->execute([
      ':nom' => $nom,
    ]);
  }

  public function listeCategorie()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM categorie
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public function voirCategorie($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM categorie where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function modifCategorie($id, $nom)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE categorie SET nom = :nom WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
    ]);
  }

  public function suppCategorie($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE FROM categorie WHERE id=:id 
    ");
    return $requete->execute(
      [
        ':id' => $id
      ]
    );
  }




  public function getId()
  {
    return $this->id;
  }
  public function getNom()
  {
    return $this->nom;
  }


  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }
  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }
 
  
}










