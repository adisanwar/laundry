<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div>
<h2>Registration Form</h2>

<?php if (session()->has('success')): ?>
    <p><?= session('success') ?></p>
<?php endif; ?>

<?php if (isset($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form method="post" action="<?= base_url('register') ?>">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value="<?= old('username') ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?= old('email') ?>"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <label for="full_name">Full Name:</label><br>
    <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>"><br>

    <label for="no_hp">Phone Number:</label><br>
    <input type="text" id="no_hp" name="no_hp" value="<?= old('no_hp') ?>"><br>

    <label for="alamat">Address:</label><br>
    <textarea id="alamat" name="alamat"><?= old('alamat') ?></textarea><br>

    <input type="submit" value="Register">
</form>
</div>
 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<?= $this->endSection() ?>