<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #006633;
            border-bottom: 2px solid #006633;
            padding-bottom: 10px;
        }
        .about-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .developer-info {
            margin-top: 20px;
        }
        .developer-info p {
            margin: 10px 0;
            font-size: 16px;
        }
        .developer-info strong {
            color: #006633;
            display: inline-block;
            width: 150px;
        }
        .system-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
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

    <div class="about-card">
        <p>This <strong>Tasks for Today Management System</strong> is a web application built using the <strong>CodeIgniter 4</strong> PHP framework. It allows team members to track daily to-do items and manage their tasks efficiently.</p>

        <div class="system-info">
            <h3>System Information</h3>
            <p><strong>Framework:</strong> CodeIgniter 4.5</p>
            <p><strong>Database:</strong> MySQL with Model + Query Builder</p>
            <p><strong>Pattern:</strong> MVC (Model-View-Controller)</p>
        </div>

        <div class="developer-info">
            <h3>Developer Information</h3>
            <p><strong>Developer:</strong> <?= esc($developer) ?></p>
            <p><strong>Section:</strong> <?= esc($section) ?></p>
            <p><strong>Professor:</strong> <?= esc($Professor) ?></p>
            <p><strong>Course:</strong> <?= esc($course) ?></p>
            <p><strong>Date:</strong> September 2026</p>
        </div>
    </div>
</body>
</html>
