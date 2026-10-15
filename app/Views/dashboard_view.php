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
            <span>Hello, <strong><?= session()->get('name'); ?></strong></span>
        </div>
        <div>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <?php if(session()->get('administrator') == 1): ?>
            <a href="<?= base_url('users') ?>">Users</a>
            <?php endif; ?>
            <a href="<?= base_url('task') ?>">Task</a>
            <a href="<?= base_url('logout') ?>" class="logout-btn">Log Out</a>
        </div>
    </div>
    <div class="dashboard-container">
        <h1>Bienvenido al Organizador de Tareas</h1>
        <p>La sesión se ha iniciado correctamente.</p>
    </div>  
</body>
</html>


