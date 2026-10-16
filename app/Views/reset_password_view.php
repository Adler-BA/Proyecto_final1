<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Password Reset - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; }
        .navbar a:hover { text-decoration: underline; }
        .reset-container { max-width: 450px; margin: 60px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .reset-container h2 { margin-top: 0; font-size: 28px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 10px; box-sizing: border-box; border: 2px solid #90caf9; border-radius: 8px; background-color: #bbdefb; }
        .btn-container { display: flex; gap: 10px; margin-top: 20px; }
        .btn-reset { background-color: #a5d6a7; border: 2px solid #388e3c; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
   <div class="navbar">
        <div>
        <a href="<?= base_url('/') ?>"><?= lang('app.home') ?></a>
            <a href="<?= base_url('lang/en') ?>" style="margin-left: 15px;">EN</a>
            <a href="<?= base_url('lang/es') ?>">ES</a>
        </div>
        <div>
            <a href="<?= base_url('signup') ?>"><?= lang('app.signup') ?></a>
            <a href="<?= base_url('login') ?>"><?= lang('app.login') ?></a>
        </div>
    </div>
    <div class="reset-container">
        <h2><?= lang('app.reset_password') ?></h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login/updatePassword') ?>" method="POST">
            <input type="hidden" name="token" value="<?= isset($token) ? $token : '' ?>">

            <div class="form-group">
                <label for="password"><?= lang('app.password') ?></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="repeat_password"><?= lang('app.repeat_password') ?></label>
                <input type="password" id="repeat_password" name="repeat_password" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-reset"><?= lang('app.reset_password') ?></button>
            </div>
        </form>
    </div>
</body>
</html>