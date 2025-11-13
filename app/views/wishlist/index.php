<h2 class="mb-4">Sản phẩm yêu thích</h2>

<?php if (empty($items)): ?>
    <div class="alert alert-info">Chưa có sản phẩm yêu thích.</div>
<?php else: ?>
<div class="row">
    <?php foreach ($items as $item): ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="<?=$item['image']?>" class="card-img-top" style="height:200px;object-fit:cover">

                <div class="card-body">
                    <h5 class="card-title"><?=$item['name']?></h5>
                    <p class="text-danger fw-bold"><?=number_format($item['price'])?> ₫</p>

                    <a href="index.php?controller=product&action=detail&id=<?=$item['product_id']?>"
                       class="btn btn-primary btn-sm">Xem</a>

                    <a href="index.php?controller=wishlist&action=remove&product_id=<?=$item['product_id']?>"
                       class="btn btn-outline-danger btn-sm">Bỏ yêu thích</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
