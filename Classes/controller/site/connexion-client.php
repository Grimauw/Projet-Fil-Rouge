<?php
session_start();

require_once "../../view/site/ViewClient.php";
require_once "../../model/ModelClient.php";
require_once "../../model/Utils.php";

if (isset($_SESSION['id']) && $_SESSION['role'] === 'user') {
  header('Location: accueil.php');
  exit;
}

if (isset($_POST['connexion'])) {
  $user = new ModelClient();
  $userData = $user->connexionClient($_POST['mail']);
  // validation coté serveur
  $donnees = [$_POST['mail']];
  $types = ["mail"];
  $data = Utils::valider($donnees, $types);

  if ($data && ($userData && password_verify($_POST['pass'], $userData['pass']))) {
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nom'] = $userData['nom'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['mail'] = $userData['mail'];
    $_SESSION['tel'] = $userData['tel'];
    $_SESSION['adresse'] = $userData['adresse'];
    $_SESSION['ville'] = $userData['ville'];
    $_SESSION['code_post'] = $userData['code_post'];
    $_SESSION['role'] = 'user';
    header('Location: accueil.php');
  } else {

    // echo "Echec d'authentification";
    echo "<h2 class='alert alert-danger' >Données non valides !</h2>"; // en cas d'insertion de donnees dans la base, il faut utiliser celle de data et non pas de post
    ViewClient::alert("danger", "Echec de la connexion", "connexion-client.php");
  }
} else {
?>
  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Connexion</title>
  </head>

  <body>
  <?php
  ViewClient::connexion();
}


  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>

  </html>