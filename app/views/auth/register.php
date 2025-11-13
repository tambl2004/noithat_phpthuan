<h2>Đăng ký tài khoản</h2>

<?php if (!empty($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color:green"><?= $success ?></p>
<?php endif; ?>

<form method="POST">
    <label>Họ tên:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng ký</button>
</form>

<p>Đã có tài khoản? <a href="index.php?option=login">Đăng nhập</a></p>
