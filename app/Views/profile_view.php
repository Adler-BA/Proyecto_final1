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
        <h2><?= lang('app.title') ?></h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="msg-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="msg-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div style="text-align: center; margin-bottom: 30px;">
           <?php if(session()->get('profile_picture')): ?>
           <img src="/Proyecto_final1/public/uploads/profiles/<?= session()->get('profile_picture') ?>" class="profile-img-preview" alt="Profile Image" width="150" height="150" style="border-radius: 50%; object-fit: cover; border: 3px solid #4CAF50;">
        <br>
          <a href="<?= base_url('profile/deletePhoto') ?>" style="color: #f44336; font-size: 14px; text-decoration: none; display: inline-block; margin-top: 10px; font-weight: bold;"><?= lang('app.delete_photo') ?></a>
        <?php else: ?>
        <img src="https://via.placeholder.com/150" class="profile-img-preview" alt="Default Profile" width="150" height="150" style="border-radius: 50%; object-fit: cover; border: 3px solid #ccc;">
        <?php endif; ?>
        </div>  
        <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label><?= lang('app.email') ?></label>
                <input type="file" name="profile_image" accept="image/*">
            </div>

            <div class="form-group">
                <label><?= lang('app.name') ?></label>
                <input type="text" name="name" value="<?= esc($user_info['name'] ?? session()->get('name')) ?>" required>
            </div>
            
            <div class="form-group">
                <label><?= lang('app.email') ?></label>
                <input type="email" name="email" value="<?= esc($user_info['email'] ?? session()->get('email')) ?>" required>
            </div>
            
            <div class="form-group">
                <label><?= lang('app.new_passwordd') ?></label>
                <input type="password" name="new_password">
            </div>

            <hr style="margin: 20px 0; border: 1px solid #ccc;">

            <div class="form-group">
                <label style="color: #d32f2f;"><?= lang('app.current_password') ?></label>
                <input type="password" name="current_password" required>
            </div>
            <button type="submit" class="btn-save"><?= lang('app.save_changes') ?></button>
        </form>
    </div>
</body>
</html>