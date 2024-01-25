<?php get_header('Editer un utilisateur', 'admin'); ?>

<h1 class="mb-4">Éditer un utilisateur </h1>

<form action="" method="POST" >
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); ?>
        <label for="email" class="form-label">Adresse email : *</label>
        <input type="textl" name="email" id="email" value="<?= getValue('email'); ?>" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorMessages['email']; ?>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('pwd'); ?>
        <label for="pwd" class="form-label">Mot de passe : *</label>
        <input type="password" name="pwd" id="pwd"  class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorMessages['pwd']; ?>
    </div>
    <div class="mb-4">
        <?php $error = checkEmptyFields('pwdConfirm'); ?>
        <label for="pwdConfirm" class="form-label">Confirmation du mot de passe : *</label>
        <input type="password" name="pwdConfirm" id="pwdConfirm" class="form-control <?= $error['class']; ?>">
        <?= $error['message']; ?>
        <?= $errorMessages['pwdConfirm']; ?>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Sauvegarder">
    </div>

</form>


<?php get_footer('admin'); ?>