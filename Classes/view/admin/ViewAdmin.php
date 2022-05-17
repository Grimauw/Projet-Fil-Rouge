<?php
require_once "../../model/ModelAdmin.php";

class ViewAdmin
{
  public static function ajoutAdmin()
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
          <input type="password" class="form-control" id="pass" name="pass" aria-describedby="passHelp" data-message="format pass non respecté !"  />
        </div>
        <div class="form-group">
          <label for="pass2">Confirmation du mot de passe*</label>
          <input type="password" class="form-control" id="pass2" name="pass2"  />
        </div>
        <small id="passHelp" class="form-text text-muted"></small>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="commercant" value="commercant" aria-describedby="choixHelp" data-message="choix obligatoire" />
          <label class="form-check-label" for="choix1">Commercant</label> <br />

          <input class="form-check-input" type="radio" name="role" id="choix2" value="choix2" />
          <label class="form-check-label" for="choix2">Magasinier</label> <br>

          <input class="form-check-input" type="radio" name="role" id="choix3" value="choix3" />
          <label class="form-check-label" for="choix3">Fournisseur</label> <br> <br>
        </div>

        <button type="submit" name="ajout" id="ajout" class="btn btn-primary">S'inscrire</button>
        <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button> <br> <br>
        <p>Déja inscrit ? La connexion c'est par ici ! >>> <a href="connexion-admin.php" class="btn btn-info">Connexion</a></p>
      </form>
    </div>
  <?php
  }

  public static function connexionAdmin()
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
        <a href="recup-mdp.php" class="text-info"><em>Mot de passe oublié ?</em></a><br><br>
        <p>Pas encore inscrit ? Hop c'est par ici >>> <a href="inscription-admin.php" class="btn btn-info">Inscription</a></p>
      </form>
    </div>
  <?php
  }

  public static function listeAdmin()
  {
      $admin = new ModelAdmin();
      $liste = $admin->listeAdmin();
      if (count($liste) > 0) {
?>
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Email</th>




                  </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($liste as $admin) {
                  ?>
                      <tr>
                          <th scope="row"><?php echo $admin['id'] ?></th>
                          <td><?php echo $admin['nom'] ?></td>
                          <td><?php echo $admin['prenom'] ?></td>
                          <td><?php echo $admin['mail'] ?></td>


                          <td>
                              <a href="profil-admin.php?id=<?php echo $admin['id'] ?>" class="btn btn-success">Voir Profil</a>
                              <a href="modif-admin.php?id=<?php echo $admin['id'] ?>" class="btn btn-info">Modifier</a>
                              <a href="supp-admin.php?id=<?php echo $admin['id'] ?>" class="btn btn-danger">Supprimer</a>
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
              <p> Aucun admin n'existe dans la liste.</p>
              <a href="accueil-admin.php"><em>Retour</em></a>
          </div>
      <?php
      }
  }
  
  public static function voirProfilAdmin($id)
  {
    $contact = new ModelAdmin();
    $user = $contact->voirProfilAdmin($id);
  ?>
    <div class="container">
      <h1>Profil</h1>
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $user['id'] . " : " . $user['nom'] . " " . $user['prenom']; ?> </h5>

          <p class="card-text">
            Mail : <a href="mailto:<?= $user['mail'] ?>" target="_blank"><?= $user['mail'] ?></a><br>
           
          </p>
          <a href="modif-admin.php?id=<?php echo $user['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-admin.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Supprimer</a>
          <a href="liste-admin.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">Retour</a>

        </div>
      </div>
    </div>
  <?php
  }

  public static function modifAdmin($id)
  {
    $contact = new ModelAdmin();
    $user = $contact->voirProfilAdmin($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../controller/admin/modif-admin.php">
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

      <button type="submit" name="modif" id="modif" class="btn btn-primary">Modifier</button>
      <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Réinitialiser</button>

    </form>
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
