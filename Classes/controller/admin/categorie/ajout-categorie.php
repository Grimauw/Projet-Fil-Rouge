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
    <title>Ajouter une Catégorie</title>
</head>

<body>

    <?php
    require_once "../../../view/admin/ViewCategorie.php";
    require_once "../../../view/admin/ViewTemplateAdmin.php";
    require_once "../../../model/ModelCategorie.php";
    require_once "../../../model/Utils.php";
  
    ViewTemplateAdmin::menuAdmin();
  
    if (isset($_POST['ajout'])) {
      $categorie = new ModelCategorie();
      if($categorie->ajoutCategorie($_POST['nom'])){
        ViewTemplateAdmin::alert("success","Catégorie ajouté avec succès", "liste-categorie.php");
      }
      else {
        ViewTemplateAdmin::alert("danger", "Erreur lors de l'ajout", "ajout-categorie.php");
      }
    } else {
      ViewCategorie::ajoutCategorie();
    }
  // ici c'est la validation coté serveur
    if (isset($_POST['ajout'])) {
      $donnees = [$_POST['nom']];
      $types = ["nom"];
      $data = Utils::valider($donnees, $types);
      if ($data) {
        echo "<h2 class='alert alert-success' >Données valides !</h2>"; // en cas d'insertion de donnees dans la base, il faut utiliser celle de data et non pas de post
    
      }
    }
    ViewTemplateAdmin::footer();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>