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
        .profile-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            background-color: #006633;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
            margin: 0 auto 20px;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info p {
            margin: 10px 0;
            font-size: 16px;
        }
        .profile-info strong {
            color: #006633;
            display: inline-block;
            width: 120px;
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

    <?php if ($user): ?>
        <div class="profile-card">
            <div class="profile-avatar">
                <?= strtoupper(substr($user['full_name'], 0, 1)) ?>
            </div>
            <div class="profile-info">
                <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
                <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
                <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                <p><strong>Member Since:</strong> <?= esc($user['created_at']) ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="profile-card">
            <p class="empty-state">No user profile found.</p>
        </div>
    <?php endif; ?>
</body>
</html>
