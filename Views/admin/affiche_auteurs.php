<?php
if (isset($_SESSION['user']) && $user->getRole() == "admin") {
    $title = "Liste des auteurs";
    // echo '<pre>';
    // print_r($tags);
    // echo '</pre>';
    ob_start();
?>




    <div class="col-md-9">
        <h2 class="text-center">Auteurs</h2>

        <table class="table table-striped border">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Added AT</th>
            </tr>
            <?php foreach ($auteurs as $auteur) : ?>
                <tr>
                    <td>
                        <?= $auteur->getName() ?>
                    </td>
                    <td>
                        <?= $auteur->getEmail() ?>
                    </td>
                    <td>
                        <?= $auteur->getAdded_at() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>




    <?php $content = ob_get_clean(); ?>
    <?php include('Views/layout.php'); ?>

<?php } else {
    header('location: index.php');
} ?>