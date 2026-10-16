<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>New User</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; font-weight: bold; }
        .logout-btn { color: #d32f2f !important; }
        .container { max-width: 600px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; }
        h2 { margin-top: 0; color: #2e7d32; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; border: 2px solid #90caf9; border-radius: 5px; box-sizing: border-box; }
        .checkbox-group { margin-bottom: 20px; }
        .checkbox-group label { display: inline-block; font-weight: normal; margin-right: 20px; }
        .btn-save { background-color: #4caf50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; }
        .btn-cancel { background-color: #f44336; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; margin-left: 10px; display: inline-block; }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="<?= base_url('lang/es') ?>" style="margin-right: 5px; font-size: 20px; text-decoration: none;" title="Español">🇪🇸</a>
            <a href="<?= base_url('lang/en') ?>" style="margin-right: 20px; font-size: 20px; text-decoration: none;" title="English">🇺🇸</a>
            <span>Hello, <strong><?= session()->get('name'); ?></strong></span>
        </div>
        <div>
            <a href="<?= base_url('dashboard') ?>"><?= lang('app.dashboard') ?></a>
            <a href="<?= base_url('profile') ?>"><?= lang('app.profile') ?></a>
            <?php if(session()->get('administrator') == 1): ?>
                <a href="<?= base_url('users') ?>"><?= lang('app.users') ?></a>
            <?php endif; ?>
            <a href="<?= base_url('tasks') ?>"><?= lang('app.tasks') ?></a>
            <a href="<?= base_url('logout') ?>" class="logout-btn" style="color: #d32f2f; font-weight: bold;"><?= lang('app.logout') ?></a>
        </div>
    </div>

    <div class="container">
        <h2><?= lang('app.new_user') ?></h2>
        <a href="<?= base_url('users') ?>" style="color: #2196F3; text-decoration: none; margin:botton: 20px; display: block;"><< <?= lang('app.back_to_index') ?></a>
        <form action="<?= base_url('user/store') ?>" method="POST">
            <div class="form-group">
                <label><?= lang('app.name') ?></label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label><?= lang('app.email') ?></label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label><?= lang('app.password') ?></label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label><?= lang('app.repeat_password') ?></label>
                <input type="password" name="repeat_password" required>
            </div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="active" value="1" checked><?= lang('app.active') ?></label>
                <label><input type="checkbox" name="administrator" value="1"><?= lang('app.administrator') ?></label>
            </div>
            <button type="submit" class="btn-save"><?= lang('app.save') ?></button>
            <a href="<?= base_url('users') ?>" class="btn-cancel"><?= lang('app.cancel') ?></a>
        </form>
    </div>
</body>
</html>