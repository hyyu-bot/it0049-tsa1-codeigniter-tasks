<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tasks for Today</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 60px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #006633;
            text-align: center;
        }
        .login-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #006633;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005529;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
        .link a {
            color: #006633;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Login</h1>
        
        <?php if (session('error')): ?>
            <div class="error"><?= session('error') ?></div>
        <?php endif; ?>
        
        <form action="/auth/authenticate" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="admin" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="admin123" required>
            </div>
            <button type="submit">Login</button>
        </form>
        
        <div class="link">
            <p>Demo credentials: admin / admin123</p>
            <p><a href="/">Back to Home</a></p>
        </div>
    </div>
</body>
</html>
