<?php
session_start();

require_once "../../view/admin/ViewAdmin.php";
require_once "../../model/ModelAdmin.php";
require_once "../../view/admin/ViewTemplateAdmin.php";

if (isset($_SESSION['id']) && $_SESSION['role'] === 'admin') {
  header('Location: accueil-admin.php');
  exit;
}
/*
if (isset($_SESSION['id'])) {
  foreach($adminRole as $role => $valeur) {
    if ( $role === $_SESSION['role'] ) {
      header('Location: accueil-admin.php');
      exit;
    }
}
}
*/



if (isset($_POST['connexion'])) {
  $user = new ModelAdmin();
  $userData = $user->connexionAdmin($_POST['mail']);
  var_dump($_POST);
  if (var_dump($userData && password_verify($_POST['pass'], $userData['pass']))) {
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nom'] = $userData['nom'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['mail'] = $userData['mail'];
    $_SESSION['role'] = "admin";
      header('Location: accueil-admin.php');
  
  } else {
    // echo "Echec d'authentification";
    ViewTemplateAdmin::alert("danger", "Echec de la connexion", "connexion-admin.php");
    var_dump($user);
    var_dump($userData);
    var_dump($_SESSION);

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
  ViewTemplateAdmin::menuAdmin();
  ViewAdmin::connexionAdmin();
  ViewTemplateAdmin::footer();
}


  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>

  </html>


  