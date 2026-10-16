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
        .tasks-container { max-width: 800px; margin: 40px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .tasks-container h2 { margin-top: 0; color: #2e7d32; text-align: center; margin-bottom: 30px; }
        .forms-wrapper { display: flex; justify-content: space-between; align-items: center; gap: 20px; margin-bottom: 30px; }
        .task-form { display: flex; gap: 10px; flex: 1; }
        .task-form input { flex: 1; padding: 10px; border: 2px solid #4caf50; border-radius: 8px; font-size: 16px; }
        .search-form { display: flex; gap: 10px; flex: 1; }
        .search-form input { flex: 1; padding: 10px; border: 2px solid #2196F3; border-radius: 8px; font-size: 16px; }
        .btn-add { background-color: #4caf50; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .btn-add:hover { background-color: #388e3c; }
        .btn-search { background-color: #2196F3; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .btn-clear { padding: 10px 15px; text-decoration: none; color: #333; background: #e0e0e0; border-radius: 8px; font-weight: bold; display: flex; align-items: center; }
        .task-list { list-style: none; padding: 0; margin: 0; }
        .task-item { background: white; border-left: 5px solid #4caf50; margin-bottom: 10px; padding: 15px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .task-desc { font-size: 16px; color: #333; text-decoration: none; }
        .task-date { font-size: 12px; color: #888; display: block; margin-top: 5px; }
        .btn-delete { background-color: #f44336; color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 14px; font-weight: bold; }
        .btn-delete:hover { background-color: #d32f2f; }
        .no-tasks { text-align: center; color: #666; font-style: italic; }
        nav ul { list-style: none; padding: 0; display: flex; justify-content: center; gap: 15px; margin-top: 20px; }
        nav ul li a { text-decoration: none; background-color: #673ab7; color: white; padding: 10px 20px; border-radius: 8px; font-weight: bold; }
        nav ul li a:hover { background-color: #512da8; }
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
    <div class="tasks-container">
        <h2><?= lang('app.tasks') ?></h2>
        <div class="forms-wrapper">
            <form class="task-form" action="<?= base_url('tasks/store') ?>" method="POST">
                <input type="text" name="description" placeholder="<?= lang('app.what_needs_to_be_done') ?>" required>
                <button type="submit" class="btn-add"><?= lang('app.add_task') ?></button>
            </form>

            <form class="search-form" action="<?= base_url('tasks') ?>" method="GET">
                <input type="text" name="search" placeholder="<?= lang('app.search') ?>" value="<?= esc($search ?? '') ?>">
                <button type="submit" class="btn-search"><?= lang('app.search') ?></button>
                <a href="<?= base_url('tasks') ?>" class="btn-clear"><?= lang('app.clear_search') ?></a>
            </form>
        </div>

        <ul class="task-list">
            <?php if(!empty($tasks)): ?>
                <?php foreach($tasks as $task): ?>
                    <li class="task-item">
                        <div>
                            <a href="<?= base_url('tasks/show/'.$task['id']) ?>" class="task-desc">
                                <?= esc($task['description']) ?>
                            </a>
                            <span class="task-date">Created: <?= date('d M Y, H:i', strtotime($task['created_at'])) ?></span>
                        </div>
                        <a href="<?= base_url('tasks/delete/'.$task['id']) ?>" class="btn-delete" onclick="return confirm('Estas seguro de borrar esta tarea?');"><?= lang('app.delete') ?></a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-tasks"><?= lang('app.no_tasks') ?></p>
            <?php endif; ?>
        </ul>

        <div style="margin-top: 20px; text-align: center; font-weight: bold;">
            <?= $pager->simpleLinks('default', 'default_simple') ?>
        </div>
    </div>

</body>
</html>