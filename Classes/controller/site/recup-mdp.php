<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: connexion-client.php');
    exit;
  }

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Récupération mdp client</title>
</head>

<body>
    <?php
    require_once "../../view/site/ViewClient.php";
    ViewClient::profilHeader();
    ViewClient::resetMdp();
/*
on veut recup notre mdp 
donc on va aller a la page de connexion
puis cliquer sur le lien du mdp oublié
puis cela nous redirige vers un formulaire d'oublie
on entre notre mail 
on envoi la demande de recup
la BDD nous renvoi une verif sur notre mail
de notre mail on clique sur le lien qui nous redirige vers le site et un formulaire de vérification
on entre notre code de vérification
et on recup (dans un input) notre MDP

https://www.sitedudev.com/cours/creer-son-site/ff086eeff7c8486885cf98281bcaaced
https://pentiminax.com/recuperer-un-mot-de-passe-oublie-en-php-790

*/



    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>