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
        <div><span>Hello, <strong><?= session()->get('name'); ?></strong></span></div>
        <div>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('users') ?>">Users</a>
            <a href="<?= base_url('tasks') ?>">Tasks</a>
            <a href="<?= base_url('logout') ?>" style="color:red;">Log out</a>
        </div>
    </div>
    <div class="container">
        <h2>User</h2>
       <a href="<?= base_url('users') ?>" style="color: #2196F3; text-decoration: none;"><< back to index</a>
       <hr>
        <p><strong>Name:</strong> <br><?= esc($user_info['name']) ?></p>
        <p><strong>Email:</strong> <br><?= esc($user_info['email']) ?></p>
        <p><strong>Active:</strong> <br><?= $user_info['active'] ? 'yes' : 'no' ?></p>
        <p><strong>Administrator:</strong> <br><?= $user_info['administrator'] ? 'yes' : 'no' ?></p>
        <p><strong>Created at:</strong> <br><?= $user_info['created_at'] ?></p>
        <p><strong>Updated at:</strong> <br><?= $user_info['updated_at'] ?></p>
        <a href="<?= base_url('users/edit/'.$user_info['id']) ?>" class="btn btn-edit">Edit</a>
        <a href="<?= base_url('users/delete'.$user_info['id']) ?>" class="btn btn-delete" onclick="return confirm('Estas seguro?')">Delete</a>
    </div>
</body>
</html>    
