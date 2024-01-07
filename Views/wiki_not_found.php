<?php

ob_start();
?>

<div class="wiki-not-found" >
    <h1>Wiki Not Found</h1>
</div>



<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>
