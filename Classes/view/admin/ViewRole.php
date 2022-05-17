<?php
require_once "../../../model/ModelRole.php";

class ViewRole
{
  public static function ajoutRole()
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
  public static function listeRole()
  {
      $role = new ModelRole();
      $liste = $role->listeRole();
      if (count($liste) > 0) {
?>
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th><a href="ajout-role.php" class="btn btn-primary">Ajouter un Rôle</a></th>

                  </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($liste as $role) {
                  ?>
                      <tr>
                          <th scope="row"><?php echo $role['id'] ?></th>
                          <td><?php echo $role['nom'] ?></td>
                          <td>
                              <a href="voir-role.php?id=<?php echo $role['id'] ?>" class="btn btn-success">Voir</a>
                              <a href="modif-role.php?id=<?php echo $role['id'] ?>" class="btn btn-info">Modifier</a>
                              <a href="supp-role.php?id=<?php echo $role['id'] ?>" class="btn btn-danger">Supprimer</a>
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
              <p> Aucun rôle n'existe dans la liste.</p>
              Ajouter un Rôle >>><a href="ajout-role.php"><em>Ajout</em></a>
          </div>
      <?php
      }
  }


  public static function voirRole($id)
  {
    $role = new ModelRole();
    $rol = $role->voirRole($id);
  ?>
    <div class="container">
      <h1>Rôle</h1>
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $rol['id'] . " : " . $rol['nom']; ?> </h5>

          <a href="modif-role.php?id=<?php echo $rol['id'] ?>" class="btn btn-info">Modifier</a>
          <a href="supp-role.php?id=<?php echo $rol['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
          <a href="liste-role.php?id=<?php echo $rol['id'] ?>" class="btn btn-primary">Retour</a>


        </div>
      </div>
    </div>
  <?php
  }

  public static function modifRole($id)
  {
    $role = new ModelRole();
    $cat = $role->voirRole($id);
  ?>
    <form class="col-md-6 offset-md-3" method="post" action="../../../controller/admin/role/modif-role.php">
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
