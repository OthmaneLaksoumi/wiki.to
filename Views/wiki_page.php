<?php


if (isset($_GET['wiki_id'])) {
  $title = $wiki->getTitle();
  ob_start();
?>

  <div class="container mt-4">
    <div class="row">

      <div class="col-md-8">
        <div class="card mb-4">
          <img src="<?= $wiki->getImg() ?>" class="card-img-top" alt="Blog Post Image">
          <div class="card-body">
            <h2 class="card-title"><?= $wiki->getTitle() ?></h2>
            <p class="card-text"><?= $wiki->getContenu() ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h6>Posted By: <?= $user->getName() ?> on <?= $date_posted ?></h6>
            <h5 class="card-title mt-4">Categories</h5>
            <ul class="list-group">
              <li class="list-group-item"><?= $catg ?></li>
            </ul>

            <h5 class="card-title mt-4">Tags</h5>
            <ul class="list-group">
              <?php foreach ($tags as $tag) : ?>
                <a href="index.php?action=wikis_for_tag&tag=<?= $tag->getName() ?>" class="text-secondary"><?= "#" . $tag->getName()?> </a>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>





  <?php $content = ob_get_clean(); ?>
  <?php include('Views/layout.php'); ?>
<?php } else {
  header('location: index.php');
} ?>