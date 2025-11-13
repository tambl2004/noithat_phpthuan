<div class="row">
    <div class="col-md-6">
        <img src="<?= $p['image'] ?>" 
             class="img-fluid rounded shadow">
    </div>

    <div class="col-md-6">
        <h2><?= $p['name'] ?></h2>
        <h4 class="text-danger fw-bold"><?= number_format($p['price']) ?>đ</h4>

        <p class="mt-3"><?= $p['description'] ?></p>

        <a href="index.php?option=themgiohang&id=<?= $p['id'] ?>"
           class="btn btn-success btn-lg mt-3">
            Thêm vào giỏ hàng
        </a>

        <a href="index.php?option=sanpham" class="btn btn-secondary btn-lg mt-3 ms-2">
            Quay lại
        </a>
    </div>
</div>
