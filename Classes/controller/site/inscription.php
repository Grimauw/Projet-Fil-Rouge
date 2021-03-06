<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Inscription</title>
</head>

<body>
  <?php
  require_once "../../view/site/ViewClient.php";
  require_once "../../model/ModelClient.php";
  require_once "../../model/Utils.php";



  if (isset($_POST['ajout'])) {
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user = new ModelClient();
var_dump($_POST['ajout']);
    // validation coté serveur
    $donnees = [$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['code_post']];
    $types = ["nom", 'prenom', 'mail', 'tel', 'adresse', 'ville', 'code_post'];
    $data = Utils::valider($donnees, $types);

    if ($data && ($user->ajoutUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $pass, $_POST['tel'], $_POST['adresse'], $_POST['ville'], $_POST['code_post']))) {
      echo "<h2 class='alert alert-success' >Données valides !</h2>"; // en cas d'insertion de donnees dans la base, il faut utiliser celle de data et non pas de post
      ?>
      <h1>Inscription faite avec succes </h1>

      <a href="connexion-client.php">Connexion</a>

    <?php
    } else {
    ?>
      <h1>Echec de l'inscription </h1>
      <a href="inscription.php">Retour</a>


  <?php
    }
  } else {
    ViewClient::ajoutUser();
  }

  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- <script src="../../../js/Val-client.js"></script> -->
</body>

</html>