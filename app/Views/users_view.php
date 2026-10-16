<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Users - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; font-weight: bold; }
        .navbar a:hover { text-decoration: underline; color: #4caf50; }
        .logout-btn { color: #d32f2f !important; }
        .container { max-width: 900px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; }
        h2 { color: #2e7d32; text-align: center; }
        .btn-new { background-color: #4caf50; color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; display: inline-block; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #4caf50; color: white; }
        tr:hover { background-color: #f1f1f1; }
        nav ul { list-style: none; padding: 0; display: flex; justify-content: center; gap: 15px; margin-top: 20px; }
        nav ul li a { text-decoration: none; background-color: #673ab7; color: white; padding: 10px 20px; border-radius: 8px; font-weight: bold; }
        nav ul li a:hover { background-color: #512da8; }
    </style>
</head>
<body>
    <div class="navbar">
        <div> 
            <span>Hello, <strong><?= session()->get('name'); ?></strong></span>
        </div>
        <div>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('users') ?>">Users</a>
            <a href="<?= base_url('tasks') ?>">Tasks</a>
            <a href="<?= base_url('logout') ?>">Log Out</a>
        </div>
    </div>

    <div class="container">
        <h2>Users Management</h2>
        <a href="<?= base_url('users/new') ?>" class="btn-new">New Users</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Administrator</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td>
                        <a href="<?= base_url('users/show/'.$user['id']) ?>" style="text-decoration: none; color: #2196F3; font-weight: bol;">
                            <?= esc($user['name']) ?>
                        </a>
                    </td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= $user['active'] == 1 ? 'Si' : 'No' ?></td>
                    <td><?= $user['administrator'] == 1 ? 'Si' : 'No' ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($user['created_at'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="margin-top: 20px; text-align: center;">
            <?= $pager->simpleLinks() ?>
        </div>
    </div> 
</body>
</html>
