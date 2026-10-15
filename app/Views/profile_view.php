<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profile - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; font-weight: bold; }
        .navbar a:hover { text-decoration: underline; color: #4caf50; }
        .logout-btn { color: #d32f2f !important; }

        .profile-container { max-width: 500px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .profile-container h2 { margin-top: 0; color: #2e7d32; text-align: center; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 10px; box-sizing: border-box; border: 2px solid #90caf9; border-radius: 8px; background-color: #bbdefb; }
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
    <div class="profile-container">
        <h2>My Profile</h2>

        <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= $user['email'] ?>" required>
            </div>

            <div class="section-title">Change Password</div>
            
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password">
            </div>
            <div class="form-group">
                <label>Repeat New Password</label>
                <input type="password" name="repeat_password">
            </div>

            <div class="section-title">Profile Picture</div>
            <div class="form-group">
                <input type="file" name="profile_image" accept="image/*">
            </div>

            <button type="submit" class="btn-save">Save Changes</button>
        </form>
    </div>
</body>
</html>