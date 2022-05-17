<?php
require_once "../../model/ModelClient.php";

class ViewClient
{
  public static function ajoutUser()
  {
   ?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" id="formValid" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
          <small id="nomHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom : </label>
          <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp" data-type="prenom" data-message="format du prenom non respecté !" />
          <small id="prenomHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="mail">Mail : *</label>
          <input type="email" class="form-control" id="mail" name="mail" aria-describedby="mailHelp" data-type="mail" data-message="format du mail non respecté !" require />
          <small id="mailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="pass">Mot de passe : *</label>
          <input type="password" class="form-control" id="pass" name="pass" aria-describedby="passHelp" data-message="format pass non respecté !" require />
        </div>
        <div class="form-group">
          <label for="pass2">Confirmation du mot de passe*</label>
          <input type="password" class="form-control" id="pass2" name="pass2" require />
        </div>
        <small id="passHelp" class="form-text text-muted"></small>

        <div class="form-group">
          <label for="tel">Tel : </label>
          <input type="tel" class="form-control" id="tel" name="tel" aria-describedby="telHelp" data-type="tel" data-message="format du tel non respecté !" />
          <small id="telHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse : </label>
          <input type="text" class="form-control" id="adresse" name="adresse" aria-describedby="adresseHelp" data-type="adresse" data-message="format de l'adresse non respecté !" />
          <small id="adresseHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="ville">Ville : </label>
          <input type="text" class="form-control" id="ville" name="ville" aria-describedby="villeHelp" data-type="ville" data-message="format de la ville non respecté !" />
          <small id="villeHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="code_post">Code postal : </label>
          <input type="number" class="form-control" id="code_post" name="code_post" aria-describedby="code_postHelp" data-type="cod_post" data-message="format du code_post non respecté !" />
          <small id="cod_postHelp" class="form-text text-muted"></small>
        </div>


        <button type="submit" name="ajout" id="ajout" class="btn btn-primary">Ajouter</button>
        <button type="reset" name="annuler" id="annuler" class="btn btn-danger"><a href="connexion-client.php">Annuler</a></button>
      </form>
      <p class="col-md-6 offset-md-3">Déjà inscrit ? Hop c'est par ici >>> <a href="connexion-client.php" class="btn btn-info">Connexion</a></p>

    </div>
    <?php
  }

  public static function connexion()
  {
   ?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="mail">Mail : </label>
          <input type="mail" class="form-control" name="mail" id="mail">
        </div>
        <div class="form-group">
          <label for="pass">Mot de passe : </label>
          <input type="password" class="form-control" name="pass" id="pass">
        </div>
        <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        <button type="reset" name="annuler" class="btn btn-danger">Annuler</button><br>
      </form>
      <a href="recup-mdp.php" class="text-info col-md-6 offset-md-3"><em>Mot de passe oublié ?</em></a><br><br>
        <p class="col-md-6 offset-md-3">Pas encore inscrit ? Hop c'est par ici >>> <a href="inscription.php" class="btn btn-info">Inscription</a></p>
    </div>
  <?php
  }
  public static function listeClient()
  {
      $client = new ModelClient();
      $liste = $client->listeClient();
      if (count($liste) > 0) {
?>
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Email</th>
                      <th scope="col">Numéro tel</th>
                      <th scope="col">Adresse</th>
                      <th scope="col">Token</th>


                  </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($liste as $client) {
                  ?>
                      <tr>
                          <th scope="row"><?php echo $client['id'] ?></th>
                          <td><?php echo $client['nom'] ?></td>
                          <td><?php echo $client['prenom'] ?></td>
                          <td><?php echo $client['mail'] ?></td>
                          <td><?php echo $client['tel'] ?></td>
                          <td><?php echo $client['adresse'] . " ". $client['ville'] . " " . $client['code_post'] ?></td>
                          <td><?php echo $client['token'] ?></td>
                          <td>
                              <a href="profil-client.php?id=<?php echo $client['id'] ?>" class="btn btn-success">Voir Profil</a>
                              <a href="modif-client.php?id=<?php echo $client['id'] ?>" class="btn btn-info">Modifier</a>
                              <a href="supp-client.php?id=<?php echo $client['id'] ?>" class="btn btn-danger">Supprimer</a>
                          </td>
                      </tr>
                  <?php
                  }
                  ?>
              </tbody>
          </table>
      <?php
      } else {
      ?>
          <div class="alert alert-danger" role="alert">
              <p> Aucun client n'existe dans la liste.</p>
              <a href="accueil-admin.php"><em>Retour</em></a>
          </div>
      <?php
      }
  }

  public static function voirProfil($id)
  {
    $contact = new ModelClient();
    $user = $contact->voirProfil($id);
   ?>
    <div class="container">
      <h1>Profil</h1>
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " " . $user['prenom']; ?> </h5>

          <p class="card-text">
            Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>
            Adresse : <?= $user['adresse'] . " " . $user['ville'] . " " . $user['code_post'] ?>
            Tel : <a href="tel:<?= $user['tel'] ?>" target="_blank"><?= $user['tel'] ?></a><br>

          </p>
          <a href="modif-client.php?id=<?php echo $user['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-client.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Supprimer</a>

        </div>
      </div>
    </div>
  <?php
  }

  public static function modifClient($id)
  {
    $contact = new ModelClient();
    $user = $contact->voirProfil($id);
    ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../controller/site/modif-client.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom" value="<?= $user['nom'] ?>" />
        <small id="nomHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp" data-type="prenom" data-message="format du prenom" value="<?= $user['prenom'] ?>" />
        <small id="prenomHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="mail">Mail : *</label>
        <input type="mail" class="form-control" id="mail" name="mail" aria-describedby="mailHelp" data-type="mail" data-message="format du mail" value="<?= $user['mail'] ?>" />
        <small id="mailHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="tel">Tel : </label>
        <input type="tel" class="form-control" id="tel" name="tel" aria-describedby="telHelp" data-type="tel" data-message="format du tel" value="<?= $user['tel'] ?>" />
        <small id="telHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="adresse">Adresse : </label>
        <input type="text" class="form-control" id="adresse" name="adresse" aria-describedby="adresseHelp" data-type="adresse" data-message="format de l'adresse" value="<?= $user['adresse'] ?>" />
        <small id="adresseHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="ville">Ville : </label>
        <input type="text" class="form-control" id="ville" name="ville" aria-describedby="villeHelp" data-type="ville" data-message="format de la ville" value="<?= $user['ville'] ?>" />
        <small id="villeHelp" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="code_post">Code postal : </label>
        <input type="number" class="form-control" id="code_post" name="code_post" aria-describedby="code_postHelp" data-type="cod_post" data-message="format du code_post" value="<?= $user['code_post'] ?>" />
        <small id="cod_postHelp" class="form-text text-muted"></small>
      </div>

      <button type="submit" name="modif" id="modif" class="btn btn-primary">Modifier</button>
      <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Réinitialiser</button>

    </form>
  <?php
  }

  public static function profilHeader()
  {
    ?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="accueil.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profil-client.php">Profil <span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
  <?php
  }

  public static function alert($type, $message, $lien = null)
  {
   ?>
    <div class="container alert  alert-<?= $type ?>" role="alert">
      <?= $message ?> <br />
      <?php
      if ($lien) {  ?>
        Cliquez <a href="connexion-client.php" class="alert-link px-2"> ici </a> pour continuer la navigation
      <?php
      }
      ?>
    </div>

  <?php
  }

  public static function resetMdp()
  {
   ?>
   <div class="container mt-5">
     <form class="col-md-6 offset-md-3" id="formValid" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

      <div class="form-group">
     <label for="mail">Mail : </label>
     <input type="email" class="form-control" id="mail" name="mail" aria-describedby="mailHelp" data-type="mail" data-message="format du mail" require />
     <small id="mailHelp" class="form-text text-muted"></small>
      </div>
        <button type="submit" name="envoyer" id="envoyer" class="btn btn-primary">Envoyer</button>
        <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button>
      </form>
    </div>
    <?php

  }





}