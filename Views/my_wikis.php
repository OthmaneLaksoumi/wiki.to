<?php
if (isset($_SESSION['user'])  && $user->getRole() == "auteur") {

    $title = "Mes wikis";

    ob_start();
?>


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
    </div>



    <?php $content = ob_get_clean(); ?>
    <?php include('Views/layout.php'); ?>

<?php } else {
    header('location: index.php');
} ?>