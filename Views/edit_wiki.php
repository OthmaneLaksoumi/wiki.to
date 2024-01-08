<?php

$title = "Crée un wiki";
// echo '<pre>';
// print_r($tags);
// print_r($tags_selected);
// echo '</pre>';
ob_start();
?>



<div class="container mt-5 mb-5">
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
                                <a class="nav-link" href="index.php">Crée un wiki</a>
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
            <form action="index.php?action=edit_wiki_action" method="post" enctype="multipart/form-data">
                <input type="text" name="wiki_id" value="<?= $wiki_selected->getId(); ?>" hidden>
                <div class="mb-3 d-flex justify-content-center">
                    <img src="<?= $wiki_selected->getImg() ?>" class="edit-wiki-images text-center" alt="">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $wiki_selected->getTitle() ?>" required>
                </div>

                <div class="form-group my-4">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="30" required><?= $wiki_selected->getContenu() ?></textarea>
                </div>

                <div class="form-group my-4">
                    <label for="img">Image:</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div>

                <div class="form-group my-4">
                    <label for="categorie">Categorie:</label>
                    <select class="form-select" name="categorie" id="categorie" required>
                        <option selected disabled>Sélectionner une catégorie</option>
                        <?php foreach ($categories as $categorie) : ?>
                            <?php if ($categorie == $catg_selected) { ?>
                                <option selected><?= $categorie->getName(); ?></option>
                            <?php } else { ?>
                                <option><?= $categorie->getName(); ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group my-4" id="tags-select">
                    <label for="tag">Tag:</label>
                    <!-- <select class="form-select mb-4" name="tag" id="tag"> -->
                    <!-- <option selected disabled>Ajoutez jusqu'à 4 tags</option> -->
                    <div class="overflow-auto" style="max-height: 200px;">
                        <?php foreach ($tags as $i => $tag) : ?>
                            <?php if(in_array($tag, $tags_selected)) { ?>
                            <div class="form-check tag-checkbox">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="<?= $tag->getName(); ?>" id="<?= $tag->getName(); ?>" checked>
                                <label class="form-check-label" for="<?= $tag->getName(); ?>"><?= $tag->getName(); ?></label>
                            </div>
                            <?php }else { ?>
                                <div class="form-check tag-checkbox">
                                <input class="form-check-input" type="checkbox"  name="tags[]" value="<?= $tag->getName(); ?>" id="<?= $tag->getName(); ?>">
                                <label class="form-check-label" for="<?= $tag->getName(); ?>"><?= $tag->getName(); ?></label>
                            </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- </select> -->
                </div>

                <button type="submit" class="btn btn-success">Modifier</button>
            </form>

        </div>
    </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>

<script>
    // let tagsSelect = document.getElementById('tags-select');

    // let tags = document.getElementById('tag');
    // let tagsSelect = document.getElementById('tags-select');

    // tags.addEventListener('input', function() {
    //     // console.log(this.value);
    //     // let numberOfTags = ;

    //    do {
    //     let checkbox = document.createElement('div');
    //     checkbox.innerHTML = `
    //     <div class="form-check tag-checkbox">
    //         <input class="form-check-input" type="checkbox" value="" id="${this.value}" checked>
    //         <label class="form-check-label" for="${this.value}">${this.value}</label>
    //     </div>
    // `;

    //     tagsSelect.appendChild(checkbox);
    //    } while(document.querySelectorAll('.tag-checkbox').length < 4);

    //     console.log(document.querySelectorAll('.tag-checkbox').length);
    // });
</script>