<!-- Banner Carousel -->
<div id="bannerCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
    </div>
    
    <div class="carousel-inner rounded">
        <div class="carousel-item active">
            <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                <div class="text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Nội Thất Cao Cấp</h1>
                    <p class="lead mb-4">Thiết kế hiện đại, chất lượng vượt trội</p>
                    <a href="index.php?option=sanpham" class="btn btn-light btn-lg px-5">Khám phá ngay</a>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center;">
                <div class="text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Giảm Giá Lên Đến 50%</h1>
                    <p class="lead mb-4">Ưu đãi đặc biệt cho khách hàng mới</p>
                    <a href="index.php?option=sanpham" class="btn btn-light btn-lg px-5">Mua ngay</a>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center;">
                <div class="text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Miễn Phí Vận Chuyển</h1>
                    <p class="lead mb-4">Cho đơn hàng trên 2 triệu đồng</p>
                    <a href="index.php?option=sanpham" class="btn btn-light btn-lg px-5">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Danh mục sản phẩm -->
<?php if (!empty($categories)): ?>
<div class="mb-5">
    <h2 class="text-center fw-bold mb-4">Danh Mục Sản Phẩm</h2>
    <div class="row g-4">
        <?php foreach ($categories as $cat): ?>
        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-couch fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold"><?= htmlspecialchars($cat['name'] ?? 'Danh mục') ?></h5>
                    <a href="index.php?option=sanpham&category_id=<?= $cat['id'] ?? '' ?>" class="btn btn-outline-primary btn-sm mt-2">
                        Xem sản phẩm
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Sản phẩm nổi bật -->
<?php if (!empty($products)): ?>
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Sản Phẩm Nổi Bật</h2>
        <a href="index.php?option=sanpham" class="btn btn-outline-primary">Xem tất cả</a>
    </div>
    
    <div class="row g-4">
        <?php foreach ($products as $product): ?>
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm h-100 border-0 product-card">
                <a href="index.php?option=chitietsanpham&id=<?= $product['id'] ?>" class="text-decoration-none text-dark">
                    <div class="position-relative overflow-hidden" style="height: 250px; background-color: #f8f9fa;">
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= htmlspecialchars($product['image']) ?>" 
                                 class="card-img-top h-100 w-100" 
                                 style="object-fit: cover;"
                                 alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        <?php endif; ?>
                        <div class="position-absolute top-0 end-0 m-2">
                            <a href="index.php?option=yeuthich&action=add&product_id=<?= $product['id'] ?>" 
                               class="btn btn-sm btn-light rounded-circle shadow-sm"
                               title="Thêm vào yêu thích">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-2" style="min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= htmlspecialchars($product['name']) ?>
                        </h6>
                        <p class="text-danger fw-bold fs-5 mb-3">
                            <?= number_format($product['price'] ?? 0, 0, ',', '.') ?> đ
                        </p>
                        <a href="index.php?option=themgiohang&product_id=<?= $product['id'] ?>" 
                           class="btn btn-primary w-100">
                            <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                        </a>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Giới thiệu -->
<div class="row mb-5 py-5 bg-white rounded shadow-sm">
    <div class="col-md-4 text-center mb-4 mb-md-0">
        <div class="mb-3">
            <i class="fas fa-shipping-fast fa-3x text-primary"></i>
        </div>
        <h5 class="fw-bold">Miễn Phí Vận Chuyển</h5>
        <p class="text-muted">Cho đơn hàng trên 2 triệu đồng</p>
    </div>
    
    <div class="col-md-4 text-center mb-4 mb-md-0">
        <div class="mb-3">
            <i class="fas fa-undo fa-3x text-success"></i>
        </div>
        <h5 class="fw-bold">Đổi Trả Dễ Dàng</h5>
        <p class="text-muted">Trong vòng 7 ngày kể từ ngày mua</p>
    </div>
    
    <div class="col-md-4 text-center">
        <div class="mb-3">
            <i class="fas fa-headset fa-3x text-info"></i>
        </div>
        <h5 class="fw-bold">Hỗ Trợ 24/7</h5>
        <p class="text-muted">Đội ngũ tư vấn chuyên nghiệp</p>
    </div>
</div>

<style>
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;
}

.carousel-item {
    transition: transform 0.6s ease-in-out;
}
</style>

<!-- Font Awesome cho icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
