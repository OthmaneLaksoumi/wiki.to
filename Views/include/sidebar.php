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

                            <div>
                                <li class="nav-item list-group-item mt-4">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                            </div>
                        <?php } else if ($user->getRole() == "auteur") { ?>
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
                                    <a class="nav-link" href="index.php?action=affiche_catgs">Categories</a>
                                </li>
                                <li class="nav-item list-group-item">
                                    <a class="nav-link" href="index.php?action=affiche_tags">Tags</a>
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