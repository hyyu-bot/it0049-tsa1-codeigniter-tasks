<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - Tasks for Today</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
            margin: 0;
        }
        .nav {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .nav a {
            color: #006633;
            text-decoration: none;
            padding: 8px 15px;
            background: #e8f5e9;
            border-radius: 4px;
        }
        .nav a:hover {
            background: #c8e6c9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #006633;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #2196F3;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
        }
        .badge-pending { background-color: #ff9800; }
        .badge-completed { background-color: #4CAF50; }
        .badge-on_hold { background-color: #9E9E9E; }
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .success {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
        .error {
            background-color: #ffcdd2;
            color: #c62828;
        }
        .empty {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?= esc($title) ?></h1>
        <div>
            <a href="/tasks/new" class="btn btn-edit">+ New Task</a>
            <a href="/logout" class="btn btn-delete" style="margin-left: 10px;">Logout</a>
        </div>
    </div>

    <?php if (session('success')): ?>
        <div class="message success"><?= session('success') ?></div>
    <?php endif; ?>
    
    <?php if (session('error')): ?>
        <div class="message error"><?= session('error') ?></div>
    <?php endif; ?>

    <?php if (isset($errors)): ?>
        <div class="message error">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (empty($tasks)): ?>
        <div class="empty">
            <p>No tasks found.</p>
            <p><a href="/tasks/new" class="btn btn-edit">Create your first task</a></p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td>
                        <span class="badge badge-<?= esc($task['status']) ?>">
                            <?= esc(ucfirst($task['status'])) ?>
                        </span>
                    </td>
                    <td>
                        <a href="/tasks/edit/<?= esc($task['id']) ?>" class="btn btn-edit">Edit</a>
                        <a href="/tasks/delete/<?= esc($task['id']) ?>" class="btn btn-delete" 
                           onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
