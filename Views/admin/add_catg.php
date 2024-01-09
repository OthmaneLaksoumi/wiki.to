<?php
if(isset($_SESSION['user']) && $user->getRole() == "admin") {
$title = "Crée un wiki";
// echo '<pre>';
// print_r($tags);
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
                        <?php } else if ($_SESSION['user'] == "auteur") { ?>
                            <li class="nav-item list-group-item mt-4">
                                <a class="nav-link" href="index.php?action=my_wikis">Mes wikis</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php?action=add_wiki">Crée un wiki</a>
                            </li>
                            <div>
                            <li class="nav-item list-group-item mt-4">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                        </div>

                        <?php  } else { ?>
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
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Auteurs</a>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link" href="index.php">Statistiques</a>
                            </li>
                        </div>


                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="index.php?action=add_wiki_action" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group my-4">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="30" required></textarea>
                </div>

                <div class="form-group my-4">
                    <label for="img">Image:</label>
                    <input type="file" class="form-control" id="img" name="img" required>
                </div>
                
                

                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>

        </div>
    </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>

<?php } else {
    header('location: index.php');
    
}?>