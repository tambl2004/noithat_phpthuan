<h2>Đăng nhập</h2>

<?php if (!empty($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng nhập</button>
</form>

<p>Chưa có tài khoản? <a href="index.php?option=register">Đăng ký</a></p>
