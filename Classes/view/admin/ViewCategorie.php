<?php
require_once "../../../model/ModelCategorie.php";

class ViewCategorie
{
  public static function ajoutCategorie()
  {
?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" id="formValid" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
          <small id="nomHelp" class="form-text text-muted"></small>
        </div>

        <button type="submit" name="ajout" id="ajout" class="btn btn-primary">Ajout</button>
        <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button>
      </form>
    </div>
  <?php
  }
  public static function listeCategorie()
  {
      $categorie = new ModelCategorie();
      $liste = $categorie->listeCategorie();
      if (count($liste) > 0) {
?>
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th><a href="ajout-categorie.php" class="btn btn-primary">Ajouter une Catégorie</a></th>

                  </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($liste as $categorie) {
                  ?>
                      <tr>
                          <th scope="row"><?php echo $categorie['id'] ?></th>
                          <td><?php echo $categorie['nom'] ?></td>
                          <td>
                              <a href="voir-categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-success">Voir</a>
                              <a href="modif-categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-info">Modifier</a>
                              <a href="supp-categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-danger">Supprimer</a>
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
              <p> Aucunes categories n'existe dans la liste.</p>
              Ajouter une Catégorie >>><a href="ajout-categorie.php"><em>Ajout</em></a>
          </div>
      <?php
      }
  }


  public static function voirCategorie($id)
  {
    $Categorie = new ModelCategorie();
    $cat = $Categorie->voirCategorie($id);
  ?>
    <div class="container">
      <h1>Catégorie</h1>
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $cat['id'] . " : " . $cat['nom']; ?> </h5>

          <a href="modif-categorie.php?id=<?php echo $cat['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-categorie.php?id=<?php echo $cat['id'] ?>" class="btn btn-danger">Supprimer</a>
          <a href="liste-categorie.php?id=<?php echo $cat['id'] ?>" class="btn btn-primary">Retour</a>


        </div>
      </div>
    </div>
  <?php
  }

  public static function modifCategorie($id)
  {
    $Categorie = new ModelCategorie();
    $cat = $Categorie->voirCategorie($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../../controller/admin/categorie/modif-categorie.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $cat['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom" value="<?= $cat['nom'] ?>" />
        <small id="nomHelp" class="form-text text-muted"></small>
      </div>
      <button type="submit" name="modif" id="modif" class="btn btn-primary">Modifier</button>
      <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Réinitialiser</button>

    </form>
  <?php
  }














}
