<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: connexion-admin.php');
    exit;
  }

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Voir contact</title>
</head>

<body>
  <?php
  require_once "../../View/admin/ViewAdmin.php";
  ViewTemplateAdmin::menuAdmin();


  if (isset($_GET['id'])) {
    $contact = new ModelAdmin();
    if ($contact->voirProfilAdmin($_GET['id'])) {
      if ($contact->suppProfilAdmin($_GET['id'])) {
        ViewTemplateAdmin::alert("success", "Contact supprimé avec succès", "connexion-admin.php");
        session_destroy();
        // header('Location: connexion-client.php');
        exit;
      } else {
        ViewTemplateAdmin::alert("danger", "Echec de la suppression", "profil-admin.php");
      }
    } 
  }
  ViewTemplateAdmin::footer();

  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>