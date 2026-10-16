<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>My Tasks - Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; font-weight: bold; }
        .navbar a:hover { text-decoration: underline; color: #4caf50; }
        .logout-btn { color: #d32f2f !important; }
        
        .tasks-container { max-width: 700px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .tasks-container h2 { margin-top: 0; color: #2e7d32; text-align: center; }
        
        .task-form { display: flex; gap: 10px; margin-bottom: 30px; }
        .task-form input { flex: 1; padding: 10px; border: 2px solid #90caf9; border-radius: 8px; font-size: 16px; }
        .btn-add { background-color: #4caf50; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .btn-add:hover { background-color: #388e3c; }

        .task-list { list-style: none; padding: 0; margin: 0; }
        .task-item { background: white; border-left: 5px solid #4caf50; margin-bottom: 10px; padding: 15px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .task-desc { font-size: 16px; color: #333; }
        .task-date { font-size: 12px; color: #888; display: block; margin-top: 5px; }
        .btn-delete { background-color: #f44336; color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 14px; font-weight: bold; }
        .btn-delete:hover { background-color: #d32f2f; }
        .no-tasks { text-align: center; color: #666; font-style: italic; }
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

    <div class="tasks-container">
        <h2>My Tasks</h2>
        <form class="task-form" action="<?= base_url('tasks/store') ?>" method="POST">
            <input type="text" name="description" placeholder="Qué necesitas?" required>
            <button type="submit" class="btn-add">Add Task</button>
        </form>
        <ul class="task-list">
            <?php if(!empty($tasks)): ?>
                <?php foreach($tasks as $task): ?>
                    <li class="task-item">
                        <div>
                            <a href="<?= base_url('tasks/show/'.$task['id']) ?>" class="task-desc" style="text-decoration:none;"><?= esc($task['description']) ?></a>
                            <span class="task-date">Created: <?= date('d M Y, H:i', strtotime($task['created_at'])) ?></span>
                        </div>
                        <a href="<?= base_url('tasks/delete/'.$task['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-tasks">Por el momento no hay tareas. Añade una.</p>
            <?php endif; ?>
        </ul>
    </div>

</body>
</html>
