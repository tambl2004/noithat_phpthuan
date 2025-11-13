<!-- app/views/product/index.php -->
<h2 class="mb-4">Danh sách sản phẩm</h2>

<div class="row">
<?php foreach ($products as $item): ?>
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100">

            <img src="<?= $item['image'] ?>" 
                 class="card-img-top" 
                 style="height: 180px; object-fit: cover;">

            <div class="card-body">
                <h5 class="card-title"><?= $item['name'] ?></h5>
                <p class="text-danger fw-bold"><?= number_format($item['price']) ?>đ</p>

                <div class="mt-auto d-flex justify-content-between">
                    <a href="index.php?controller=product&action=detail&id=<?= $item['id'] ?>"
                    class="btn btn-sm btn-outline-primary">
                        Xem chi tiết
                    </a>
                    <a href="index.php?controller=wishlist&action=add&product_id=<?= $item['id'] ?>"
                    class="btn btn-sm btn-outline-danger">
                        ❤ Yêu thích
                    </a>
                </div>
            </div>

        </div>
    </div>
<?php endforeach; ?>
</div>
