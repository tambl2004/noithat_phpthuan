<h2 class="mb-4">Giỏ hàng</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
    <tr>
        <th>Ảnh</th>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $total = 0;
    while ($row = $items->fetch_assoc()):
        $subtotal = $row['price'] * $row['quantity'];
        $total += $subtotal;
    ?>
        <tr>
            <td><img src="<?= $row['image'] ?>" width="80" class="rounded"></td>
            <td><?= $row['name'] ?></td>
            <td class="text-danger fw-bold"><?= number_format($row['price']) ?>đ</td>
            <td><?= $row['quantity'] ?></td>
            <td class="fw-bold"><?= number_format($subtotal) ?>đ</td>
            <td><a href="index.php?option=xoagiohang&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">X</a></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<h3 class="text-end mt-3">
    Tổng tiền: <span class="text-danger fw-bold"><?= number_format($total) ?>đ</span>
</h3>

<div class="text-end mt-3">
    <a href="index.php?option=thanhtoan" class="btn btn-primary btn-lg">
        Đặt hàng
    </a>
</div>
