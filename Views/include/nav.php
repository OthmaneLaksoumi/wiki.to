<nav class="navbar navbar-expand-lg bg-secondary bg-gradient">
    <div class="container col-12">

        <a class="navbar-brand col-3 text-black" href="index.php">Wiki.to</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse col-3 justify-content-around" id="navbarSupportedContent">
            <?php if (str_ends_with($_SERVER['REQUEST_URI'], 'index.php') || (isset($_GET['action']) && ($_GET['action'] == 'my_wikis' || $_GET['action'] == 'wikis_for_tag'))) : ?>
                <form class="col-6" role="search">
                    <input class="form-control me-2" type="search" id="search" placeholder="Recherche des wikis, tags, categories" aria-label="Search">
                </form>
            <?php else: ?>
                <form class="col-6" role="search" style="visibility: hidden;">
                    <input class="form-control me-2" type="search" id="search" placeholder="Recherche des wikis" aria-label="Search">
                </form>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])) { ?>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="btn btn-outline-light">
                        <a href="index.php?action=sign_up" class="text-dark" style="text-decoration: none;">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?action=login">Se connecter</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="btn btn-outline-light">
                        <a href="index.php?action=logout" class="text-dark" style="text-decoration: none;">Se déconnecter</a>
                    </li>
                    <li class="btn text-light mx-2">
                        <?= $_SESSION['user'] ?>
                    </li>
                </ul>
            <?php } ?>
        </div>


    </div>
</nav>