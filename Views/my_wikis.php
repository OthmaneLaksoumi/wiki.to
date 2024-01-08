<?php

$title = "Mes wikis";

ob_start();
?>



<div class="container mt-5">
    <div class="row">

        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <ul class="list-group">
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <li class="btn btn-outline-secondary list-group-item">
                                <a href="index.php?action=sign_up" class="text-dark">S'inscrire</a>
                            </li>

                            <li class="btn mt-4 btn-outline-secondary list-group-item border">
                                <a href="index.php?action=login" class="text-dark">Se connecter</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item list-group-item mt-4">
                                <a class="nav-link" href="index.php?action=my_wikis">Mes wikis</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php?action=add_wiki">Crée un wiki</a>
                            </li>
                            
                            
                        <?php  } ?>
                        <div>
                            <li class="nav-item list-group-item mt-4">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Categories</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Tags</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php foreach ($wikis as $wiki) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?= $wiki->getImg() ?>" class="card-img-top border" alt="Image 1" style="height: 200px !important">
                            <div class="card-body">
                                <a class="card-title h5" href="index.php?action=wiki_page&wiki_id=<?= $wiki->getId() ?>"><?= $wiki->getTitle() ?></a>
                                <p class="card-text"><?= substr($wiki->getContenu(), 0, 100) . "..." ?></p>
                                <?php foreach ($tags[$wiki->getId()] as $tag) { ?>
                                    <span><?= "#" . $tag ?> </span>
                                <?php } ?>
                                <div class="mt-3">
                                    <a href="index.php?action=edit_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn btn-outline-secondary">Modifier</a>
                                    <a href="index.php?action=delete_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn btn-outline-secondary" onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer votre blog?')">Supprimer</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="public/images/smart.png" class="card-img-top border" alt="Image 1">
                        <div class="card-body">
                            <a class="card-title" href="index.php">Titre de la Carte 1</a>
                            <p class="card-text">Description courte de la carte 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="public/images/smart.png" class="card-img-top border" alt="Image 1">
                        <div class="card-body">
                            <a class="card-title" href="index.php">Titre de la Carte 1</a>
                            <p class="card-text">Description courte de la carte 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="public/images/smart.png" class="card-img-top border" alt="Image 1">
                        <div class="card-body">
                            <a class="card-title" href="index.php">Titre de la Carte 1</a>
                            <p class="card-text">Description courte de la carte 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="public/images/smart.png" class="card-img-top border" alt="Image 1">
                        <div class="card-body">
                            <a class="card-title" href="index.php">Titre de la Carte 1</a>
                            <p class="card-text">Description courte de la carte 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="public/images/smart.png" class="card-img-top border" alt="Image 1">
                        <div class="card-body">
                            <a class="card-title" href="index.php">Titre de la Carte 1</a>
                            <p class="card-text">Description courte de la carte 1.</p>
                        </div>
                    </div>
                </div> -->


        </div>
    </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>