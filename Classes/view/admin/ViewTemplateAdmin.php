<?php

class ViewTemplateAdmin
{

    public static function menuAdmin()
    {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="accueil-admin.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../profil-admin.php">Profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../role/liste-role.php">Rôle</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Listing
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../categorie/liste-categorie.php">Categorie</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../marque/liste-marque.php">Marques</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produit/liste-produit.php">Produit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../transporteur/liste-transporteur.php">Transporteur</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Le Client
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../site/liste-client.php">Liste Clients</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../marque/liste-marque.php">Messages</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../produit/liste-produit.php">Commandes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../transporteur/liste-transporteur.php">Détails Commande</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-none"  href="../admin/liste-admin.php">Liste des Admin</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <?php

    }


    public static function footer()
    {
    ?>
        <div class="bg-dark py-4 mt-5 text-center text-light h3">
            <div class="container">
                copyright &copy; <?= date("Y") ?>
            </div>
        </div>
    <?php
    }

// ici on va la déprécié et utiliser la fonction menuAdmin à la place ou l'utiliser pour les autres utilisateur 
    public static function profilHeaderAdmin()
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
                            <a class="nav-link" href="accueil-admin.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="profil-admin.php">Profil <span class="sr-only">(current)</span></a>
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
                Cliquez <a href="<?= $lien ?>" class="alert-link px-2"> ici </a> pour continuer la navigation.
            <?php
            }
            ?>
        </div>
    <?php

    }
    public static function alertModif($type, $message, $lien = null)
    {
    ?>
        <div class="container alert  alert-<?= $type ?>" role="alert">
            <?= $message ?> <br />
            <?php
            if ($lien) {  ?>
                Cliquez <a href="<?= $lien ?>?id=<?= $_GET['id'] ?>" class="alert-link px-2"> ici </a> pour continuer la navigation.
            <?php
            }
            ?>
        </div>
    <?php

    }












}