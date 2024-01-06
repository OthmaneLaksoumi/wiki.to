<?php

$title = "Se connecter";

ob_start();
?>

<h2 class="text-center mt-4">Se connecter</h2>
<form class="container form-control mt-5 login-form" method="post" action="index.php?action=login_action">
    <div class="mb-3 email-div">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 password-div">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <?php if (isset($user_existence) && $user_existence == false) { ?>
        <div class="mb-3 text-danger">
            <label class="form-label">L'adresse e-mail ou Mot de passe est incorrect.</label>
        </div>
    <?php } ?>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-secondary">Se connecter</button>
    </div>
</form>

<script src="public/js/login_validation.js"></script>

<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>