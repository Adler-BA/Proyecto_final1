<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; font-weight: bold; }
        .navbar a:hover { text-decoration: underline; color: #4caf50; }
        .logout-btn { color: #d32f2f !important; }
        .dashboard-container { max-width: 800px; margin: 60px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 40px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; }
        .dashboard-container h1 { color: #2e7d32; font-size: 36px; margin-bottom: 10px; }
        .dashboard-container p { font-size: 18px; color: #555; }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
        <a href="<?= base_url('lang/es') ?>" style="margin-right: 5px; font-size: 20px; text-decoration: none;" title="Español">🇪🇸</a>
            <a href="<?= base_url('lang/en') ?>" style="margin-right: 20px; font-size: 20px; text-decoration: none;" title="English">🇺🇸</a>
            <?php if(session()->get('isLoggedIn')): ?>
                <span style="margin-left: 15px;">Hello, <strong><?= session()->get('name'); ?></strong></span>
            <?php else: ?>
            <a href="<?= base_url('/') ?>" style="margin-left: 15px;"><?= lang('app.home') ?></a>
            <?php endif; ?>
        </div>
        <div>
            <?php if(session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('profile') ?>"><?= lang('app.profile') ?></a>
                
                <?php if(session()->get('administrator') == 1): ?>
                    <a href="<?= base_url('users') ?>"><?= lang('app.users') ?></a>
                <?php endif; ?>
                
                <a href="<?= base_url('tasks') ?>"><?= lang('app.tasks') ?></a>
                <a href="<?= base_url('logout') ?>" style="color: #d32f2f; font-weight: bold;"><?= lang('app.logout') ?></a>
            <?php else: ?>
            <a href="<?= base_url('signup') ?>"><?= lang('app.signup') ?></a>
                <a href="<?= base_url('login') ?>"><?= lang('app.login') ?></a>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')): ?>
                <div style="background-color: #c8e6c9; color: #2e7d32; padding: 10px; border-radius: 5px; text-align: center; margin: 10px;">
                <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>            
    <div class="dashboard-container">
        <h1><?= lang('app.welcome') ?></h1>
        <p><?= lang('app.session_started') ?></p>
    </div>  
</body>
</html>


