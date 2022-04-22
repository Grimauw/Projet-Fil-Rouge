<?php
// ici il faut faire une modif pour que la session se modifie en même temps que les données !
// ici il faut faire une modif car j'ai retirer la modif de l'email car il faut verifier qu'il n'existe pas dans la base de donnée en modifiant !
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: connexion-client.php');
    exit;
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Modification du Profil</title>
</head>

<body>
  <?php
  require_once "../../view/site/ViewClient.php";
  require_once "../../model/ModelClient.php";

  ViewClient::profilHeader();  // ici il faut que je fasse un header commun pour les autres controller si je ne suis pas co !

  $contact = new ModelClient();
  if (isset($_GET['id'])) {
    if ($contact->voirProfil($_GET['id'])) {
      ViewClient::modifClient($_GET['id']);
    } else {
      ViewClient::alert("danger", "L'utilisateur n'existe pas", "profil-client.php");
    }
  } else {
    if (isset($_POST['id']) && $contact->voirProfil($_POST['id'])) {
      if ($contact->modifClient($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['code_post'])) {        
        ViewClient::alert("success", "Votre profil a été modifié avec succès", "profil-client.php");
      } else {
        ViewClient::alert("danger", "Echec de la modification", "profil-client.php");
      }
    } else {
      ViewClient::alert("danger", "Aucune donnée n'a été transmise", "profil-client.php");
    }
  }

  // ViewTemplate::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- <script src="../../../js/Val-client.js"></script> -->

</body>

</html>