<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://cdn.tiny.cloud/1/mcmx72bx5rnq7a7w5n1nlha39obj95qo69whrf4zi45ijp2v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists link wordcount advlist',
            toolbar: 'undo redo | bold italic | bullist numlist | link image',
        });
    </script>
    <title><?= $title ?></title>
</head>

<body>


    <?php include('include/nav.php'); ?>

    <?php if (!isset($_GET['wiki_id']) || $_GET['action'] == "edit_wiki") : ?>
        <div class="container mt-5">
            <div class="row">

                <?php include('include/sidebar.php'); ?>

            <?php endif; ?>
            <?= $content ?>

            </div>
        </div>


        <script src="Public\js\ajax_search.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>