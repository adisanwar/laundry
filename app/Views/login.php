<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>

    <?php if (session()->has('error')): ?>
        <p><?= session('error') ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= old('email') ?>"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="remember_me">Remember Me:</label>
        <input type="checkbox" id="remember_me" name="remember_me" value="1" <?= old('remember_me') ? 'checked' : '' ?>><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
