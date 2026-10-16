<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-weight: bold; }
        .container { max-width: 600px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; }
        h2 { margin-top: 0; color: #2e7d32; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] { width: 100%; padding: 10px; border: 2px solid #90caf9; border-radius: 5px; box-sizing: border-box; }
        .btn-save { background-color: #4caf50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; width: 100%; margin-top: 10px;}
        .msg-error { color: white; background-color: #f44336; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; }
        .msg-success { color: white; background-color: #4caf50; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; }
        .profile-img-preview { display: block; margin: 0 auto 20px auto; width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 3px solid #4caf50; }
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
            
            <a href="<?= base_url('tasks') ?>">Tasks</a>
            <a href="<?= base_url('logout') ?>" class="logout-btn">Log out</a>
        </div>
    </div>
    <div class="container">
        <h2>Mi Perfil</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="msg-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="msg-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if(!empty($user_info['profile_image'])): ?>
            <img src="<?= base_url('uploads/'.$user_info['profile_image']) ?>" class="profile-img-preview" alt="Profile Image">
        <?php else: ?>
            <img src="https://via.placeholder.com/150" class="profile-img-preview" alt="Default Profile">
        <?php endif; ?>
        <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Foto de Perfil</label>
                <input type="file" name="profile_image" accept="image/*">
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="<?= esc($user_info['name'] ?? session()->get('name')) ?>" required>
            </div>
            
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="email" name="email" value="<?= esc($user_info['email'] ?? session()->get('email')) ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nueva Contraseña. Deje en blanco si no busca cambiar la contraseña</label>
                <input type="password" name="new_password">
            </div>

            <hr style="margin: 20px 0; border: 1px solid #ccc;">

            <div class="form-group">
                <label style="color: #d32f2f;">Contraseña Actual. Ingresela para guardar cambios.</label>
                <input type="password" name="current_password" required>
            </div>

            <button type="submit" class="btn-save">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>