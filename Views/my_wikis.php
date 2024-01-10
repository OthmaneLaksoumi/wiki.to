<?php
if (isset($_SESSION['user'])  && $user->getRole() == "auteur") {

    $title = "Mes wikis";

    ob_start();
?>


    <div class="col-md-9">
        <div class="row">
            <?php foreach ($wikis as $wiki) { ?>
                <div class="col-lg-4 col-md-6 mb-4 wikis" id="<?= $wiki->getId() ?>">
                    <div class="card shadow-sm" style="height: 500px;">
                        <img src="<?= $wiki->getImg() ?>" class="card-img-top border" alt="Image 1" style="height: 200px !important">
                        <div class="card-body">
                            <a class="card-title h5" href="index.php?action=wiki_page&wiki_id=<?= $wiki->getId() ?>">
                                <?= $wiki->getTitle() ?> <?php if($wiki->getState() == 0) : ?> <span class='text-danger'> (Archivé)</span> <?php endif; ?>
                            </a>
                            <p class="card-text"><?= substr($wiki->getContenu(), 0, 100) . "..." ?></p>
                            <?php foreach ($tags[$wiki->getId()] as $tag) { ?>
                                <a href="index.php?action=wikis_for_tag&tag=<?= $tag ?>" class="text-secondary"><?= "#" . $tag ?> </a>
                            <?php } ?>
                            <div class="mt-3" style="position: absolute; bottom: 15px;">
                                <a href="index.php?action=edit_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn text-secondary">Modifier</a>
                                <a href="index.php?action=delete_wiki&wiki_id=<?= $wiki->getId() ?>" class="btn btn-outline-secondary" onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer votre blog?')">Supprimer</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>
    </div>



    <?php $content = ob_get_clean(); ?>
    <?php include('Views/layout.php'); ?>

<?php } else {
    header('location: index.php');
} ?>