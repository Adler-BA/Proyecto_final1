<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; }
        .navbar a:hover { text-decoration: underline; }
        .content { padding: 50px 30px; }
        .content h1 { font-size: 36px; margin-bottom: 10px; }
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

    <div class="content">
        <h1><?= lang('app.welcomme') ?></h1>
        <p><?= lang('app.welcome') ?>.</p>
    </div>

</body>
</html>