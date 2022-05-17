<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Inscription Admin</title>
</head>

<body>
  <?php
  require_once "../../view/admin/ViewAdmin.php";
  require_once "../../model/ModelAdmin.php";
  require_once "../../view/admin/ViewTemplateAdmin.php";

ViewTemplateAdmin::menuAdmin();
var_dump($_POST);
// if($_SERVER['REQUEST_METHOD'] == 'POST')  // try avec la méthode de request mais sans succée
  if ((isset($_POST['ajout']))) {
    var_dump($_POST['ajout']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user = new ModelAdmin();
    if (var_dump($user->ajoutAdmin($_POST['nom'], $_POST['prenom'], $_POST['mail'], $pass, $_POST['role']))) { // ici problème d'index a cause de l'input radio ? résolu si je met l'input en checked dans le formu
    ?>
      <h1>Inscription faite avec succes </h1>
      <a href="connexion-admin.php">Connexion</a>
    <?php
    } else {
    ?>
      <h1>Echec de l'inscription </h1>
      <a href="inscription-admin.php">Retour</a>
    <?php
    }
  } 
 

  
  else {
    ViewAdmin::ajoutAdmin();
  }
  ViewTemplateAdmin::footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- <script src="../../../js/Val-client.js"></script> -->
</body>

</html>