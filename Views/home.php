<?php

$title = "Page d'acceuil";

ob_start();
?>

<div class="col-md-9">
    <div class="row">
        <?php foreach ($wikis as $wiki) { ?>
            <div class="col-lg-4 col-md-6 mb-4 wikis" id="<?= $wiki->getId() ?>">
                <div class="card shadow-sm" style="height: 460px;">
                    <img src="<?= $wiki->getImg() ?>" class="card-img-top border" alt="Image 1" style="height: 200px !important">
                    <div class="card-body">
                        <a class="card-title h5" href="index.php?action=wiki_page&wiki_id=<?= $wiki->getId() ?>">
                            <?= $wiki->getTitle() ?>
                            <?php if ($wiki->getState() == 0) :  ?>
                                <span class="text-danger">(Archivé)</span>
                            <?php endif; ?>
                        </a>
                        <p class="card-text"><?= substr($wiki->getContenu(), 0, 50) . "..." ?></p>
                        <?php foreach ($tags[$wiki->getId()] as $tag) { ?>
                            <a href="index.php?action=wikis_for_tag&tag=<?= $tag ?>" class="text-secondary"><?= "#" . $tag ?> </a>
                        <?php } ?>
                        <?php if (isset($_SESSION['user']) && $user->getRole() == "admin") : ?>
                            <div style="position: absolute; bottom: 15px;">
                                <?php if ($wiki->getState() == 0) :  ?>
                                    <a href="index.php?action=dearchive_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn btn-outline-success">Désarchivé</a>
                                <?php else : ?>
                                    <a href="index.php?action=archive_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn btn-outline-danger">Archivée</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>



<?php $content = ob_get_clean(); ?>


<?php include('Views/layout.php'); ?>