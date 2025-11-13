<div class="row">
    <div class="col-md-6">
        <img src="<?= $p['image'] ?>" 
             class="img-fluid rounded shadow">
    </div>

    <div class="col-md-6">
        <h2><?= $p['name'] ?></h2>
        <h4 class="text-danger fw-bold"><?= number_format($p['price']) ?>đ</h4>

        <p class="mt-3"><?= $p['description'] ?></p>

        <div class="d-flex gap-2 mt-3">
            <form action="index.php?controller=cart&action=add" method="post">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit" class="btn btn-primary">
                    Thêm vào giỏ hàng
                </button>
            </form>

            <a href="index.php?controller=wishlist&action=add&product_id=<?= $product['id'] ?>"
            class="btn btn-outline-danger">
                ❤ Thêm vào yêu thích
            </a>
        </div>

        <a href="index.php?option=sanpham" class="btn btn-secondary btn-lg mt-3 ms-2">
            Quay lại
        </a>
    </div>
</div>
