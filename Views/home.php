<?php

$title = "Home";

ob_start();
?>



<!-- <div class="container mt-5">
    <div class="row"> -->

        

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