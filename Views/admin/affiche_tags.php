<?php
if (isset($_SESSION['user']) && $user->getRole() == "admin") {
    $title = "Liste des tags";
    // echo '<pre>';
    // print_r($tags);
    // echo '</pre>';
    ob_start();
?>




    <div class="col-md-9">
        <h2 class="text-center">Tags</h2>
        <div class="text-center mb-3 d-flex flex-column justify-content-center affiche_input">
            <form action="index.php?action=add_tag_action" method="post">
                <input type="text" class="form-control mx-auto my-3 border border-secondary" name="tag" style="width: 50%;" required>
                <input type="submit" class="btn btn-secondary" value="Ajouter">

            </form>
            <?php if (isset($tag_exist) && $tag_exist == true) : ?>
                <p class="mt-4">Tag déja ajouté</p>
            <?php endif; ?>
            <!-- <a href="index.php?action=add_catg" class="btn btn-secondary">Add</a> -->
        </div>
        <table class="table table-striped border">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($tags as $tag) : ?>
                <tr>
                    <td>
                        <form action="index.php?action=edit_tag_action" method="post">
                            <input type="text" value="<?= $tag->getName() ?>" name="old_catg" hidden>
                            <input type="text" class="display-non form-control" name="new_catg" style="width: 50%; display: inline;" value="<?= $tag->getName() ?>">
                            <input type="submit" class="disply-no form-control btn btn-secondary" style="width: fit-content; display: inline;" value="Modifier">
                        </form>

                    </td>
                    <td>
                        <a href="index.php?action=delete_tag&tag_name=<?= $tag->getName() ?>" onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette categorie?')"><i class="fa fa-trash" style="font-size:24px; color: red;"></i></a>
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