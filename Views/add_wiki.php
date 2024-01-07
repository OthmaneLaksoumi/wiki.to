<?php

$title = "Home";

echo '<pre>';
print_r($_POST);
echo '</pre>';
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
                                <a class="nav-link" href="index.php">Ajouter un wiki</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Modifier un wiki</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Supprimer un wiki</a>
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
            <form action="index.php?action=add_wiki" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group my-4">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="30" required></textarea>
                </div>

                <div class="form-group my-4">
                    <label for="img">Content:</label>
                    <input type="file" class="form-control" id="img" name="img" required></textarea>
                </div>

                <div class="form-group my-4">
                    <label for="categorie">Categorie:</label>
                    <select class="form-select" name="categorie" id="categorie">
                        <option selected disabled>Sélectionner une catégorie</option>
                        <?php foreach ($categories as $categorie) : ?>
                            <option><?= $categorie->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group my-4">
                    <label for="tag">Tag:</label>
                    <select class="form-select" name="tag" id="tag">
                        <option selected disabled>Sélectionner une tag</option>
                        <?php foreach ($tags as $tag) : ?>
                            <option><?= $tag->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>

        </div>
    </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>