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
  require_once "../../../view/admin/ViewMarque.php";
  require_once "../../../view/admin/ViewTemplateAdmin.php";
  require_once "../../../model/ModelMarque.php";
  require_once "../../../model/Utils.php";
  

  ViewTemplateAdmin::menuAdmin();  // ici il faut que je fasse un header commun pour les autres controller si je ne suis pas co !

  $marque = new ModelMarque();
  if (isset($_GET['id'])) {
    if ($marque->voirMarque($_GET['id'])) {
      ViewMarque::modifMarque($_GET['id']);
    } else {
      ViewTemplateAdmin::alert("danger", "L'utilisateur n'existe pas", "voir-marque.php");
    }
  } else {


    if (var_dump(isset($_POST['id'], $_POST['ajout']) && var_dump($marque->voirMarque($_POST['id'])))) {
      // vérif upload
      var_dump($_FILES['fichier']);    // null  
      $extensions = ["jpg", "jpeg", "png", "gif"];
      $upload = Utils::upload($extensions, $_FILES['fichier']);
      var_dump($upload);  // null aussi
      $_FILES['fichier']['name'] = $upload['file_name'];
      var_dump($_FILES['fichier']);          
      
      // vérif coté serveur
      $donnees = [$_POST['nom']];
      $types = ["nom"];
      $data = Utils::valider($donnees, $types);
      var_dump($_FILES);
      var_dump($_POST);
      if ($data && $marque->modifMarque($_POST['id'], $_POST['nom'], $_FILES['fichier']['name'])) {
        ViewTemplateAdmin::alert("success", "Votre Catégorie a été modifié avec succès !", "liste-marque.php");

      } else {
        echo "<h1>" . $upload['errors'] . "</h1>";
        ViewTemplateAdmin::alert("danger", "Echec de la modification !", "liste-marque.php");
      }
    } else {
      ViewTemplateAdmin::alert("danger", "Aucune modification n'a était effectué !", "liste-marque.php");
    }
  }

  ViewTemplateAdmin::footer();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- <script src="../../../js/Val-client.js"></script> -->

</body>

</html>