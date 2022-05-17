<?php
require_once "connexion.php";

class ModelRole
{

  private $id;
  private $nom;

  public function __construct($id = null, $nom = null)
  {
    $this->id = $id;
    $this->nom = $nom;
  }

  
  public  function ajoutRole($nom)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO role VALUES (null, :nom)
    ");
    return $requete->execute([
      ':nom' => $nom,
    ]);
  }

  public function listeRole()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM role
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public function voirRole($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM role where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function modifRole($id, $nom)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE role SET nom = :nom WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
    ]);
  }

  public function suppRole($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE FROM role WHERE id=:id 
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










