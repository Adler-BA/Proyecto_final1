<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Task Details</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2fbf2; margin:0; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; background-color: white; border-bottom: 2px solid #333; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-weight: bold; }
        .container { max-width: 500px; margin: 40px auto; background: #e8f5e9; padding: 30px; border-radius: 10px; border: 1px solid #4caf50; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; color: white; font-weight: bold; }
        .btn-edit { background: #2196F3; }
        .btn-delete { background: #f44336; }
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
        <h2>Task Details</h2>
        <a href="<?= base_url('tasks') ?>"><< back to index</a>
        <hr>
        <p><strong>ID:</strong> <?= $task['id'] ?></p>
        <p><strong>Description:</strong> <?= esc($task['description']) ?></p>
        <p><strong>Created at:</strong> <?= $task['created_at'] ?></p>
        <p><strong>Updated at:</strong> <?= $task['updated_at'] ?></p>
        <br>
        <a href="<?= base_url('tasks/edit/'.$task['id']) ?>" class="btn btn-edit">Edit</a>
        <a href="<?= base_url('tasks/delete/'.$task['id']) ?>" class="btn btn-delete" onclick="return confirm('Are you sure?');">Delete</a>
    </div>
</body>
</html>