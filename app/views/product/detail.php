
<h2>Chi tiết sản phẩm</h2>

<?php if (!empty($p)): ?>

    <h3><?= $p['name'] ?></h3>
    <p><b>Giá:</b> <?= number_format($p['price']) ?>đ</p>
    <p><b>Mô tả:</b> <?= $p['description'] ?></p>

    <img src="/noithat/public/uploads/<?= $p['image'] ?>" width="300">

    <br><br>
    <a href="index.php?option=giohang&action=add&id=<?= $p['id'] ?>">Thêm vào giỏ hàng</a>

<?php else: ?>
    <p>Sản phẩm không tồn tại!</p>
<?php endif; ?>
