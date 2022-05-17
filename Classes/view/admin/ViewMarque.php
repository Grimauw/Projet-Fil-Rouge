<?php
require_once "../../../model/ModelMarque.php";

class ViewMarque
{
  public static function ajoutMarque()
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
  public static function listeMarque()
  {
    $marque = new ModelMarque();
    $liste = $marque->listeMarque();
    if (count($liste) > 0) {
    ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Logo</th>
            <th><a href="ajout-marque.php" class="btn btn-primary">Ajouter une Marque</a></th>

          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($liste as $marque) {
          ?>
            <tr>
              <th scope="row"><?php echo $marque['id'] ?></th>
              <td><?php echo $marque['nom'] ?></td>
              <td><img src="../../../../images/<?php echo $marque['logo'] ?>" alt="Logo de la marque" width="100px" height="50px"></td> 
              <td>
                <a href="voir-marque.php?id=<?php echo $marque['id'] ?>" class="btn btn-success">Voir</a>
                <a href="modif-marque.php?id=<?php echo $marque['id'] ?>" class="btn btn-info">Modifier</a>
                <a href="supp-marque.php?id=<?php echo $marque['id'] ?>" class="btn btn-danger">Supprimer</a>
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
        <p> Aucunes marque n'existe dans la liste.</p>
        Ajouter une Marque >>><a href="ajout-marque.php"><em>Ajout</em></a>
      </div>
    <?php
    }
  }


  public static function voirMarque($id)
  {
    $marque = new ModelMarque();
    $mark = $marque->voirMarque($id);
    ?>
    <div class="container">
      <h1>Marque</h1>
      <div class="card" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $mark['id'] . " : " . $mark['nom']; ?> </h5>
          <img src="../../../../images/<?php echo $mark['logo'] ?>" alt="Logo de la marque" width="150px" height="75px"><br><br>

          <a href="modif-marque.php?id=<?php echo $mark['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-marque.php?id=<?php echo $mark['id'] ?>" class="btn btn-danger">Supprimer</a>
          <a href="liste-marque.php?id=<?php echo $mark['id'] ?>" class="btn btn-primary">Retour</a>

        </div>
      </div>
    </div>
  <?php
  }

  public static function modifMarque($id)
  {
    $Marque = new ModelMarque();
    $mark = $Marque->voirMarque($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../../controller/admin/marque/modif-marque.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $mark['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom" value="<?= $mark['nom'] ?>" />
        <small id="nomHelp" class="form-text text-muted"></small>
      </div>
      <div class="custom-file">
          <input type="file" name="fichier" id="fichier" value="<?= $mark['logo'] ?>">
          <label for="customFile">Upload du Logo</label>
          <br><br>
        </div>
      <button type="submit" name="ajout" id="ajout" class="btn btn-primary">Modifier</button>
      <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Réinitialiser</button>

    </form>
<?php
  }



  public static function suppMarqueLogo() {

  }
}
