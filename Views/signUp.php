<?php

$title = "S'inscrire";

ob_start();
?>

<h2 class="text-center mt-4">Inscription pour les Auteurs</h2>
<form class="container form-control mt-5  sign-up-form" method="post" action="index.php?action=sign_up_action">
    <div class="mb-3 email-div">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 name-div">
        <label for="name" class="form-label">Nom et prénom</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3 password-div">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <?php if (isset($user_existence) && $user_existence == false) { ?>
        <div class="mb-3 text-danger">
            <label class="form-label">Cette adresse e-mail est déjà associée à un utilisateur existant.</label>
        </div>
    <?php } ?>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-secondary">S'inscrire</button>
    </div>
</form>

<script src="public/js/sign_up_validation.js"></script>

<?php $content = ob_get_clean(); ?>
<?php include('Views/layout.php'); ?>