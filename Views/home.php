<?php

$title = "Home";

ob_start();
?>




<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>