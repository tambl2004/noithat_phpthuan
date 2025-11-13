<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Furniture Shop</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?option=home">Furniture Shop</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="index.php?option=home">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?option=sanpham">Sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?option=giohang">Giỏ hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?option=diachi">Địa chỉ của tôi</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?option=yeuthich">Sản phẩm yêu thích</a></li>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?option=login">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?option=register">Đăng ký</a></li>
                <?php else: ?>
                    <li class="nav-item">
                        <span class="nav-link text-warning">Xin chào, <?= $_SESSION['user_name'] ?></span>
                    </li>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                        <li class="nav-item"><a class="nav-link text-info" href="index.php?option=admin">Admin</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?option=logout">Đăng xuất</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- nội dung -->
<div class="container py-4">
    <?php include $viewFile; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/cart.js"></script>
</body>
</html>
