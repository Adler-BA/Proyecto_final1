<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2fbf2; margin:0; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; background-color: white; border-bottom: 2px solid #333; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-weight: bold; }
        .container { max-width: 600px; margin: 40px auto; background: #e8f5e9; padding: 30px; border-radius: 10px; border: 1px solid #4caf50; }
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
        <div><span>Hello, <strong><?= session()->get('name'); ?></strong></span></div>
        <div>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('users') ?>">Users</a>
            <a href="<?= base_url('tasks') ?>">Tasks</a>
            <a href="<?= base_url('logout') ?>" style="color:red;">Log out</a>
        </div>
        <div class="container">
        <h2>Edit user</h2>
        
        <form action="<?= base_url('users/update/'.$user_info['id']) ?>" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?= esc($user_info['name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= esc($user_info['email']) ?>" required>
            </div>
            <div class="form-group">
                <label>Passowrd (Deje en blanco para mantenerse actualizado)</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <label>Repeat Password</label>
                <input type="password" name="repeat_password">
            </div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="active" value="1" <?= $user_info['active'] ? 'checked' : '' ?>>Active</label>
                <label><input type="checkbox" name="administrator" value="1" <?= $user_info['administrator'] ? 'checked' : '' ?>>Administrator</label>
            </div>
            <button type="submit" class="btn-save">Save</button>
            <a href="<?= base_url('users/show/'.$user_info['id']) ?>" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>

