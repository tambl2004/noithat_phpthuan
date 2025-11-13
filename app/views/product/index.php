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

                <a href="index.php?option=chitietsanpham&id=<?= $item['id'] ?>"
                   class="btn btn-outline-primary w-100">
                    Xem chi tiết
                </a>
            </div>

        </div>
    </div>
<?php endforeach; ?>
</div>
