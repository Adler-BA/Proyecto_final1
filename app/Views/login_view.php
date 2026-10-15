<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-devide-width, initial-scale=1.0">
    <title>Organizador de Tareas</title>
    <style>
        body {
font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2fbf2; /* Fondo con un tono verde muy claro basado en el boceto */
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 15px 30px;
            border-bottom: 2px solid #333;
            background-color: #ffffff;
        }
        .navbar a {
            text-decoration: none;
            color: #333;
            margin-right: 15px;
            font-size: 16px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .login-container {
            max-width: 450px;
            margin: 60px auto;
            background: #e8f5e9;
            border: 1px solid #4caf50;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .login-container h2 {
            margin-top: 0;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 2px solid #a5d6a7;
            border-radius: 8px;
            background-color: #ffcdd2; 
        }
        .btn-login {
            background-color: #81c784;
            border: 2px solid #388e3c;
            padding: 10px 25px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #66bb6a;
        }
        .links-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .links-container a {
            color: #1976d2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="<?= base_url('/') ?>">Home</a>
            <a href="#">English</a>
            <a href="#">Español</a>
        </div>
        <div>
            <a href="<?= base_url('signup') ?>">Sign Up</a>
            <a href="<?= base_url('login') ?>">Log In</a>
        </div>
    </div>
    <div class="Login-container">
        <h2>Login</h2>
        <form action="<?= base_url('login/authenticate') ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-grou">
                <label for="pasword">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        <div class="form-group" style="margin-bottom: 5px;">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember" style="display: inline; font-weight: normal;">Remember Me</label>
        </div>
    <div class="link-container">
        <button type="submit" class="btn-login">Log In</button>
        <a href="<?= base_url('forgot-password') ?>">Forgot Password</a>
    </div>
    </form>
</div>
</body>
</html>
