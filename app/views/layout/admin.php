<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Furniture Shop</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 5px;
            margin: 5px 0;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar-admin {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3">
                    <h4 class="text-white mb-4">
                        <i class="fas fa-couch me-2"></i>
                        Admin Panel
                    </h4>
                    
                    <nav class="nav flex-column">
                        <a class="nav-link" href="index.php?option=admin">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a class="nav-link" href="index.php?option=admin&action=categories">
                            <i class="fas fa-tags me-2"></i> Danh Mục
                        </a>
                        <a class="nav-link" href="index.php?option=admin&action=products">
                            <i class="fas fa-box me-2"></i> Sản Phẩm
                        </a>
                        <a class="nav-link" href="index.php?option=home">
                            <i class="fas fa-home me-2"></i> Về Trang Chủ
                        </a>
                        <a class="nav-link" href="index.php?option=logout">
                            <i class="fas fa-sign-out-alt me-2"></i> Đăng Xuất
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-0">
                <!-- Navbar -->
                <nav class="navbar navbar-admin px-4 py-3">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h5 class="mb-0"><?= $pageTitle ?? 'Quản Trị' ?></h5>
                        <div class="d-flex align-items-center">
                            <span class="text-muted me-3">
                                <i class="fas fa-user me-2"></i>
                                <?= $_SESSION['user_name'] ?? 'Admin' ?>
                            </span>
                        </div>
                    </div>
                </nav>

                <!-- Content -->
                <div class="p-4">
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $success ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $error ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php include $viewFile; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Highlight menu item active
        const currentUrl = window.location.href;
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            if (currentUrl.includes(link.getAttribute('href').split('&')[0])) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>

