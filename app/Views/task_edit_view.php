<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2fbf2; margin:0; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; background-color: white; border-bottom: 2px solid #333; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-weight: bold; }
        .container { max-width: 500px; margin: 40px auto; background: #e8f5e9; padding: 30px; border-radius: 10px; border: 1px solid #4caf50; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 2px solid #90caf9; border-radius: 5px; }
        .btn-save { background: #4caf50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-cancel { background: #f44336; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; margin-left: 10px;}
    </style>
</head>
<body>
    <div class="navbar">
        <div><span>Hello, <strong><?= session()->get('name'); ?></strong></span></div>
        <div>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('tasks') ?>">Tasks</a>
            <a href="<?= base_url('logout') ?>" style="color:red;">Log Out</a>
        </div>
    </div>
    <div class="container">
        <h2>Edit Task</h2>
        <form action="<?= base_url('tasks/update/'.$task['id']) ?>" method="POST">
            <label>Description</label>
            <input type="text" name="description" value="<?= esc($task['description']) ?>" required>
            <br><br>
            <button type="submit" class="btn-save">Save</button>
            <a href="<?= base_url('tasks/show/'.$task['id']) ?>" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>