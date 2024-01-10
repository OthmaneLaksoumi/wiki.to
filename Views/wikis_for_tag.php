<?php
if (isset($_GET['tag'])) :
    $title = $tag_selected;

    ob_start();
?>

    <div class="col-md-9">
        <h1 class="text-secondary"><?= "#" . $tag_selected ?></h1>
        <div class="row">
            <?php foreach ($wikis as $wiki) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm" style="height: 450px;">
                        <img src="<?= $wiki->getImg() ?>" class="card-img-top border" alt="Image 1" style="height: 200px !important">
                        <div class="card-body">
                            <a class="card-title h5" href="index.php?action=wiki_page&wiki_id=<?= $wiki->getId() ?>"><?= $wiki->getTitle() ?></a>
                            <p class="card-text"><?= substr($wiki->getContenu(), 0, 100) . "..." ?></p>
                            <?php foreach ($tags[$wiki->getId()] as $tag) { ?>
                                <a href="index.php?action=wikis_for_tag&tag=<?= $tag ?>" class="text-secondary"><?= "#" . $tag?> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    </div>
    </div>
    </div>


    <?php $content = ob_get_clean(); ?>
    <?php include('Views/layout.php'); ?>

<?php else : ?>

    <?php header('loation: index.php'); ?>
<?php endif; ?>