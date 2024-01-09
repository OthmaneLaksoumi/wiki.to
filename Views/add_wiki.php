<?php
if(isset($_SESSION['user']) && $user->getRole() == "auteur") {
$title = "Crée un wiki";
// echo '<pre>';
// print_r($tags);
// echo '</pre>';
ob_start();
?>




        <div class="col-md-9">
            <h1 class="text-center mb-3">Ajouter un Wiki</h1>
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
                
                <div class="form-group my-4">
                    <label for="categorie">Categorie:</label>
                    <select class="form-select" name="categorie" id="categorie" required>
                        <option selected disabled>Sélectionner une catégorie</option>
                        <?php foreach ($categories as $categorie) : ?>
                            <option><?= $categorie->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group my-4" id="tags-select">
                    <label for="tag">Tag:</label>
                    <!-- <select class="form-select mb-4" name="tag" id="tag"> -->
                    <!-- <option selected disabled>Ajoutez jusqu'à 4 tags</option> -->
                    <div class="overflow-auto" style="max-height: 200px;">
                        <?php foreach ($tags as $i => $tag) : ?>
                            <div class="form-check tag-checkbox">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="<?= $tag->getName(); ?>" id="<?= $tag->getName(); ?>">
                                <label class="form-check-label" for="<?= $tag->getName(); ?>"><?= $tag->getName(); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- </select> -->
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>

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


<?php } else {
    header('location: index.php');
    
}?>