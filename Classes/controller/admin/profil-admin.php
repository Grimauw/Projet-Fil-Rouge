<?php
// session_start();
// // ici ce code permet de verifier si la session est encore open ! car après une suppression nous ne pouvons plus revenir null part !
// if (!isset($_SESSION['id']) && $_SESSION['role'] === ('Admin' || 'Commercant')) {
//     header('Location: connexion-admin.php');
//     exit;
//   }

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Profil</title>
</head>

<body>
    <?php
    require_once "../../../view/admin/ViewAdmin.php";
    require_once "../../../view/admin/ViewTemplateAdmin.php";

    ViewTemplateAdmin::menuAdmin();
    ViewAdmin::voirProfilAdmin($_SESSION['id']);
    ViewTemplateAdmin::footer();




    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>