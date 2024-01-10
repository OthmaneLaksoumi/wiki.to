<?php
if (isset($_SESSION['user']) && $user->getRole() == "admin") {
    $title = "Statistics";
    // echo '<pre>';
    // print_r($tags);
    // echo '</pre>';
    ob_start();
?>



    <div class="col-md-9">

        <h1 class="mb-4">Statistics</h1>

        <div class="row">
            <div class="col-md-5 mx-auto border p-3">
                <div class="stat-box">
                    <h2>Auteurs</h2>
                    <ul>
                        <li class="lead">Il exist <?= $allAuteur ?> auteur</li>
                    </ul>
                </div>  
            </div>

            <div class="col-md-5 mx-auto border p-3">
                <div class="stat-box">
                    <h2>Wikis</h2>
                    <ul>
                        <li class="lead">Il exist <?= $allWikis ?> Wikis</li>
                        <li class="lead">Il exist <?= $NoArchiveWikis ?> public wikis</li>
                        <li class="lead">Il exist <?= $archiveWikis ?> archive wikis</li>
                    </ul>

                </div>
            </div>

            <div class="col-md-5 mt-5 mx-auto border p-3">
                <div class="stat-box">
                    <h2>Categories</h2>
                    <ul>
                        <li class="lead">Il exist <?= $allCatgs ?> categories</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 mt-5 mx-auto border p-3">
                <div class="stat-box">
                    <h2>Tags</h2>
                    <ul>
                        <li class="lead">Il exist <?= $allTags ?> tags</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php $content = ob_get_clean(); ?>
    <?php include('Views/layout.php'); ?>

<?php } else {
    header('location: index.php');
} ?>