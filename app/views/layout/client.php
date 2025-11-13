<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Furniture Shop</title>

    <link rel="stylesheet" href="/noithat/public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

    <h1 style="text-align:center;">FURNITURE SHOP</h1>

    <nav>
    <a href="index.php?option=home">Trang chủ</a> |
    <a href="index.php?option=sanpham">Sản phẩm</a> |
    <a href="index.php?option=giohang">Giỏ hàng</a> |

    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="index.php?option=login">Đăng nhập</a> |
        <a href="index.php?option=register">Đăng ký</a>
    <?php else: ?>
        Xin chào, <?= $_SESSION['user_name'] ?> |
        <a href="index.php?option=logout">Đăng xuất</a>
    <?php endif; ?>
</nav>

<hr>

    <hr>

    <?php include $viewFile; ?>

</body>
</html>
