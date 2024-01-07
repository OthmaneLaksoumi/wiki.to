<?php


if (isset($_GET['wiki_id'])) {
    $title = $wiki->getTitle();
    ob_start();
?>

<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <!-- Blog Posts -->
        <div class="card mb-4">
          <img src="public/images/smart.png" class="card-img-top" alt="Blog Post Image">
          <div class="card-body">
            <h2 class="card-title"><?= $wiki->getTitle() ?></h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>

        <!-- Repeat the above card structure for each blog post -->

      </div>
      <!-- Sidebar -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Categories</h5>
            <!-- Add your categories here -->
            <ul class="list-group">
              <li class="list-group-item">Category 1</li>
              <li class="list-group-item">Category 2</li>
              <li class="list-group-item">Category 3</li>
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