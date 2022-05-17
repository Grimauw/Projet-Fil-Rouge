<?php
require_once "../../../model/ModelProduit.php";

class ViewProduit
{
  public static function ajoutProduit()
  {
?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" id="formValid" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
          <small id="nomHelp" class="form-text text-muted"></small><br>
        </div>
        <label for="reference">Réference : </label>
          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
          <small id="nomHelp" class="form-text text-muted"></small><br>
        </div>
        <label for="description">Description : </label>
          <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp" data-type="description" data-message="format de la description non respecté !" />
          <small id="descriptionHelp" class="form-text text-muted"></small><br>
        </div>
        <label for="quantite">Quantité : </label>
          <input type="number" class="form-control" id="quantite" name="quantite" aria-describedby="quantiteHelp" data-type="quantite" data-message="format de la quantite non respecté !" />
          <small id="quantiteHelp" class="form-text text-muted"></small><br>
        </div>
        <label for="prix">Prix : </label>
          <input type="number" class="form-control" id="prix" name="prix" aria-describedby="prixHelp" data-type="prix" data-message="format du prix non respecté !" />
          <small id="prixHelp" class="form-text text-muted"></small><br>
        </div>
        </div>
        <label for="id_categorie"> </label>
          <input type="checkbox" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" data-type="nom" data-message="format du nom non respecté !" />
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
  public static function listeProduit()
  {
    $produit = new ModelProduit();
    $liste = $produit->listeProduit();
    if (count($liste) > 0) {
    ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Logo</th>
            <th><a href="ajout-produit.php" class="btn btn-primary">Ajouter une Produit</a></th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($liste as $produit) {
          ?>
            <tr>
              <th scope="row"><?php echo $produit['id'] ?></th>
              <td><?php echo $produit['nom'] ?></td>
              <td><img src="../../../../images/<?php echo $produit['logo'] ?>" alt="Logo de la produit" width="100px" height="50px"></td> 
              <td>
                <a href="voir-produit.php?id=<?php echo $produit['id'] ?>" class="btn btn-success">Voir</a>
                <a href="modif-produit.php?id=<?php echo $produit['id'] ?>" class="btn btn-info">Modifier</a>
                <a href="supp-produit.php?id=<?php echo $produit['id'] ?>" class="btn btn-danger">Supprimer</a>
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
        <p> Aucunes produit n'existe dans la liste.</p>
        Ajouter une Produit >>><a href="ajout-produit.php"><em>Ajout</em></a>
      </div>
    <?php
    }
  }


  public static function voirProduit($id)
  {
    $produit = new ModelProduit();
    $mark = $produit->voirProduit($id);
    ?>
    <div class="container">
      <h1>Produit</h1>
      <div class="card" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $mark['id'] . " : " . $mark['nom']; ?> </h5>
          <img src="../../../../images/<?php echo $mark['logo'] ?>" alt="Logo de la produit" width="150px" height="75px"><br><br>

          <a href="modif-produit.php?id=<?php echo $mark['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-produit.php?id=<?php echo $mark['id'] ?>" class="btn btn-danger">Supprimer</a>
          <a href="liste-produit.php?id=<?php echo $mark['id'] ?>" class="btn btn-primary">Retour</a>

        </div>
      </div>
    </div>
  <?php
  }

  public static function modifProduit($id)
  {
    $Produit = new ModelProduit();
    $mark = $Produit->voirProduit($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../../controller/admin/produit/modif-produit.php">
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



  public static function suppProduitLogo() {

  }
}
