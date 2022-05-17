<?php
// ici il faut faire une modif pour que la session se modifie en même temps que les données !
// ici il faut faire une modif car j'ai retirer la modif de l'email car il faut verifier qu'il n'existe pas dans la base de donnée en modifiant !
// session_start();

// if (!isset($_SESSION['id']) && ($_SESSION['role'] === 'admin')) {
//     header('Location: connexion-admin.php');
//     exit;
//   }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Modification de la Catégorie</title>
</head>

<body>
  <?php
  require_once "../../../view/admin/ViewCategorie.php";
  require_once "../../../view/admin/ViewTemplateAdmin.php";
  require_once "../../../model/ModelCategorie.php";
  

  ViewTemplateAdmin::menuAdmin();  // ici il faut que je fasse un header commun pour les autres controller si je ne suis pas co !

  $categorie = new ModelCategorie();
  if (isset($_GET['id'])) {
    if ($categorie->voirCategorie($_GET['id'])) {
      ViewCategorie::modifCategorie($_GET['id']);
    } else {
      ViewTemplateAdmin::alert("danger", "L'utilisateur n'existe pas", "voir-categorie.php");
    }
  } else {
    if (isset($_POST['id']) && $categorie->voirCategorie($_POST['id'])) {
      if ($categorie->modifCategorie($_POST['id'], $_POST['nom'])) {
        ViewTemplateAdmin::alert("success", "Votre Catégorie a été modifié avec succès !", "liste-categorie.php");

      } else {
        ViewTemplateAdmin::alert("danger", "Echec de la modification !", "voir-categorie.php");
      }
    } else {
      ViewTemplateAdmin::alert("danger", "Aucune modification n'a était effectué !", "voir-categorie.php");
    }
  }

  ViewTemplateAdmin::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- <script src="../../../js/Val-client.js"></script> -->

</body>

</html>