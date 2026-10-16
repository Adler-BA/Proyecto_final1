<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f1f8e9; }
        .container { width: 400px; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; border: 1px solid #c5e1a5; }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #90caf9; border-radius: 5px; background-color: #bbdefb; }
        .btn-send { background-color: #a5d6a7; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-cancel { background-color: #ef9a9a; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none; color: black; font-weight: bold; margin-left: 10px; }
        .alert { padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .alert-error { background-color: #ffcdd2; color: #c62828; }
        .alert-success { background-color: #c8e6c9; color: #2e7d32; }
    </style>
</head>
<body>  
    <div class="container">
        <h2>Forgot Password</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login/sendResetLink') ?>" method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <br><br>
            <button type="submit" class="btn-send">Send</button>
            <a href="<?= base_url('login') ?>" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
