<?php
// session_start();

// if (!isset($_SESSION['id']) && ($_SESSION['role'] === 'admin')) {
//   header('Location: connexion-admin.php');
//   exit;
// }

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Ajouter un Transporteur</title>
</head>

<body>

  <?php
  require_once "../../../view/admin/ViewTransporteur.php";
  require_once "../../../view/admin/ViewTemplateAdmin.php";
  require_once "../../../model/ModelTransporteur.php";
  require_once "../../../model/Utils.php";

  ViewTemplateAdmin::menuAdmin();

  if (isset($_POST['ajout'])) {

      // Validation de l'upload
      $extensions = ["jpg", "jpeg", "png", "gif"];
      $upload = Utils::upload($extensions, $_FILES['fichier']);
      var_dump($upload);
      $_FILES['fichier']['name'] = $upload['file_name'];

      // validation coté serveur
      $donnees = [$_POST['nom']];
      $types = ["nom"];
      $data = Utils::valider($donnees, $types);

    $categorie = new ModelTransporteur();
    if ($data && ($upload['uploadOk']) && ($categorie->ajoutTransporteur($_POST['nom'], $_FILES['fichier']['name']))) {


      echo "<h2 class='alert alert-success' >Données valides !</h2>"; // en cas d'insertion de donnees dans la base, il faut utiliser celle de data et non pas de post
      ViewTemplateAdmin::alert("success", "Marque ajouté avec succès", "liste-transporteur.php");
    } else {
      echo "<h1>" . $upload['errors'] . "</h1>";
      ViewTemplateAdmin::alert("danger", "Erreur lors de l'ajout", "ajout-transporteur.php");
    }
  } else {
    ViewTransporteur::ajoutTransporteur();
  }


  ViewTemplateAdmin::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>