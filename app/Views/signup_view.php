<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sing Up</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2fbf2; }
        .navbar { display: flex; justify-content: space-between; padding: 15px 30px; border-bottom: 2px solid #333; background-color: #ffffff; }
        .navbar a { text-decoration: none; color: #333; margin-right: 15px; font-size: 16px; }
        .navbar a:hover { text-decoration: underline; }
        .signup-container { max-width: 450px; margin: 60px auto; background: #e8f5e9; border: 1px solid #4caf50; border-radius: 15px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .signup-container h2 { margin-top: 0; font-size: 28px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 10px; box-sizing: border-box; border: 2px solid #90caf9; border-radius: 8px; background-color: #bbdefb; /* Azul claro como en el boceto */ }
        .btn-container { display: flex; gap: 10px; margin-top: 20px; }
        .btn-signup { background-color: #a5d6a7; border: 2px solid #388e3c; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .btn-cancel { background-color: #ef9a9a; border: 2px solid #d32f2f; padding: 10px 25px; border-radius: 8px; font-weight: bold; cursor: pointer; text-decoration: none; color: black; display: inline-block; }
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
    <div class="signup-container">
        <h2>Sign Up</h2>

        <form action="<?= base_url('signup/store') ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="repeat_password">Repeat password</label>
                <input type="password" id="repeat_password" name="repeat_password" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-signup">Sign Up</button>
                <a href="<?= base_url('/') ?>" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
