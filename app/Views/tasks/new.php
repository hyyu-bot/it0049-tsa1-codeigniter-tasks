<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - Tasks for Today</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #006633;
            border-bottom: 2px solid #006633;
            padding-bottom: 10px;
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
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #006633;
        }
        button {
            background-color: #006633;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005529;
        }
        .cancel {
            background-color: #666;
            margin-left: 10px;
        }
        .cancel:hover {
            background-color: #555;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="/tasks">&larr; Back to Tasks</a>
    </div>

    <h1><?= esc($title) ?></h1>

    <?php if (isset($errors)): ?>
        <div class="error">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/tasks/store" method="post">
        <div class="form-group">
            <label for="title">Task Title *</label>
            <input type="text" id="title" name="title" 
                   placeholder="Enter task title" 
                   value="<?= old('title') ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="task_date">Task Date *</label>
            <input type="date" id="task_date" name="task_date" 
                   value="<?= old('task_date') ?: date('Y-m-d') ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="pending" <?= old('status') === 'pending' || old('status') === null ? 'selected' : '' ?>>Pending</option>
                <option value="completed" <?= old('status') === 'completed' ? 'selected' : '' ?>>Completed</option>
                <option value="on_hold" <?= old('status') === 'on_hold' ? 'selected' : '' ?>>On Hold</option>
            </select>
        </div>

        <button type="submit">Create Task</button>
        <a href="/tasks" class="btn cancel">Cancel</a>
    </form>
</body>
</html>
