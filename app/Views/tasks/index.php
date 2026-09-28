<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #006633;
            border-bottom: 2px solid #006633;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #006633;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status-completed {
            color: #28a745;
            font-weight: bold;
        }
        .status-pending {
            color: #ffc107;
            font-weight: bold;
        }
        .nav {
            margin-bottom: 20px;
        }
        .nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #006633;
            font-weight: bold;
        }
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?= base_url('/') ?>">Today's Tasks</a>
        <a href="<?= base_url('tasks') ?>">All Tasks</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
    </div>

    <h1><?= esc($title) ?></h1>
    <p>Total Tasks: <strong><?= $count ?></strong></p>

    <?php if ($tasks !== []): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td>
                            <?php if ($task['status'] === 'completed'): ?>
                                <span class="status-completed">✓ Completed</span>
                            <?php else: ?>
                                <span class="status-pending">○ Pending</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($task['task_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
