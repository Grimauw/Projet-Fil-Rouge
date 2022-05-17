<?php
require_once "connexion.php";
// $GLOBALS['adminRole'];
// $adminRole = [
//   1 => 'Admin',
//   2 => 'Commercant',
//   3 => 'Fournisseur'
// ];

class ModelAdmin
{

  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $pass;
  private $role;


  public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $pass = null, $role = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->pass = $pass;
    $this->role = $role;

  }



  public  function ajoutAdmin($nom, $prenom, $mail, $pass, $role)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO employe VALUES (null, :nom, :prenom, :mail, :pass, :role)
    ");
    return $requete->execute([
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ':pass' => $pass,
      ':role' => $role,
    ]);
  }

  public function connexionAdmin($mail){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM employe WHERE mail=:mail
    ");

      $requete->execute([
      ':mail' => $mail,
     ]); 
     return $requete->fetch(PDO::FETCH_ASSOC);     
  }

  public function listeAdmin()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM employe
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public function voirProfilAdmin($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM employe where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public function suppProfilAdmin($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE FROM employe WHERE id=:id 
    ");
    return $requete->execute(
      [
        ':id' => $id
      ]
    );
  }

  public function modifAdmin($id, $nom, $prenom, $mail, $role)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE employe SET nom = :nom, prenom = :prenom, mail = :mail, role = :role WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ':tel' => $role,
    ]);
  }


  public function resetMDP($mail) 
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT pass FROM employe where mail=:mail;
    ");
    $requete->execute([
      ':mail' => $mail,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }








  
  public function getId()
  {
    return $this->id;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }
  public function getMail()
  {
    return $this->mail;
  }
  public function getPass()
  {
    return $this->pass;
  }
  public function getRole()
  {
    return $this->role;
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
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
    return $this;
  }
  public function setMail($mail)
  {
    $this->mail = $mail;
    return $this;
  }
  public function setPass($pass)
  {
    $this->pass = $pass;
    return $this;
  }
  public function setRole($role)
  {
    $this->role = $role;
    return $this;
  } 
}










