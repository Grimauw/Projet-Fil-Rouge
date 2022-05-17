<?php
require_once "../../../model/ModelTransporteur.php";

class ViewTransporteur
{
  public static function ajoutTransporteur()
  {
?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" id="formValid" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
          <small id="nomHelp" class="form-text text-muted"></small><br>
        </div>
        <div class="custom-file">
        <label for="customFile">Upload du Logo</label><br>
          <input type="file" name="fichier" id="fichier"><br><br>
        </div>

        <button type="submit" name="ajout" id="ajout" class="btn btn-primary">Envoyer</button>
        <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button>
      </form>
    </div>
    <?php
  }
  public static function listeTransporteur()
  {
    $transporteur = new ModelTransporteur();
    $liste = $transporteur->listeTransporteur();
    if (count($liste) > 0) {
    ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Logo</th>
            <th><a href="ajout-transporteur.php" class="btn btn-primary">Ajouter un Transporteur</a></th>

          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($liste as $transport) {
          ?>
            <tr>
              <th scope="row"><?php echo $transport['id'] ?></th>
              <td><?php echo $transport['nom'] ?></td>
              <td><img src="../../../../images/<?php echo $transport['logo'] ?>" alt="Logo de la marque" width="100px" height="50px"></td> 
              <td>
                <a href="voir-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-success">Voir</a>
                <a href="modif-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-info">Modifier</a>
                <a href="supp-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-danger">Supprimer</a>
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
        <p> Aucun transporteur n'existe dans la liste.</p>
        Ajouter un Transporteur >>><a href="ajout-transporteur.php"><em>Ajouter</em></a>
      </div>
    <?php
    }
  }


  public static function voirTransporteur($id)
  {
    $transporteur = new ModelTransporteur();
    $transport = $transporteur->voirTransporteur($id);
    ?>
    <div class="container">
      <h1>Transporteur</h1>
      <div class="card" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $transport['id'] . " : " . $transport['nom']; ?> </h5>
          <img src="../../../../images/<?php echo $transport['logo'] ?>" alt="Logo du transporteur" width="150px" height="75px"><br><br>

          <a href="modif-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-danger">Supprimer</a>
          <a href="liste-transporteur.php?id=<?php echo $transport['id'] ?>" class="btn btn-primary">Retour</a>

        </div>
      </div>
    </div>
  <?php
  }

  public static function modifTransporteur($id)
  {
    $transporteur = new ModelTransporteur();
    $transport = $transporteur->voirTransporteur($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../../controller/admin/transporteur/modif-transporteur.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $transport['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom" value="<?= $transport['nom'] ?>" />
        <small id="nomHelp" class="form-text text-muted"></small>
      </div>
      <div class="custom-file">
          <input type="file" name="fichier" id="fichier" value="<?= $transport['logo'] ?>">
          <label for="customFile">Upload du Logo</label>
          <br><br>
        </div>
      <button type="submit" name="ajout" id="ajout" class="btn btn-primary">Modifier</button>
      <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Réinitialiser</button>

    </form>
<?php
  }



  public static function suppMarqueLogo() {
// ici ca sera pour supp l'image du dossier si ya beosin de html sinon go controler
  }
}
