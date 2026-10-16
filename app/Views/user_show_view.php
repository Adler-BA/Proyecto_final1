<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2fbf2; margin:0; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; background-color: white; border-bottom: 2px solid #333; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-weight: bold; }
        .container { max-width: 500px; margin: 40px auto; background: #e8f5e9; padding: 30px; border-radius: 10px; border: 1px solid #4caf50; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; color: white; font-weight: bold; display: inline-block; margin-top: 15px; }
        .btn-edit { background: #2196F3; }
        .btn-delete { background: #f44336; }
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
        <h2><?= lang('app.user') ?></h2>
       <a href="<?= base_url('users') ?>" style="color: #2196F3; text-decoration: none;"><< <?= lang('app.back_to_index') ?></a>
       <hr>
        <p><strong><?= lang('app.name') ?></strong> <br><?= esc($user_info['name']) ?></p>
        <p><strong><?= lang('app.email') ?></strong> <br><?= esc($user_info['email']) ?></p>
        <p><strong><?= lang('app.active') ?>:</strong> <br><?= $user_info['active'] ? 'yes' : 'no' ?></p>
        <p><strong><?= lang('app.administrator') ?>:</strong> <br><?= $user_info['administrator'] ? 'yes' : 'no' ?></p>
        <p><strong><?= lang('app.created_at') ?>:</strong> <br><?= $user_info['created_at'] ?></p>
        <p><strong><?= lang('app.updated_at') ?>:</strong> <br><?= $user_info['updated_at'] ?></p>
        <a href="<?= base_url('users/edit/'.$user_info['id']) ?>" class="btn btn-edit"><?= lang('app.edit') ?></a>
        <a href="<?= base_url('users/delete'.$user_info['id']) ?>" class="btn btn-delete" onclick="return confirm('Estas seguro?')"><?= lang('app.delete') ?></a>
    </div>
</body>
</html>    
