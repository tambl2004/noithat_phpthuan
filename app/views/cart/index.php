<h2>Giỏ hàng của bạn</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Ảnh</th>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th></th>
    </tr>

    <?php 
    $total = 0;
    while ($row = $items->fetch_assoc()):
        $subtotal = $row['price'] * $row['quantity'];
        $total += $subtotal;
    ?>
        <tr>
            <td><img src="/noithat/public/uploads/<?= $row['image'] ?>" width="80"></td>
            <td><?= $row['name'] ?></td>
            <td><?= number_format($row['price']) ?>đ</td>
            <td><?= $row['quantity'] ?></td>
            <td><a href="index.php?option=xoagiohang&id=<?= $row['id'] ?>">Xoá</a></td>
        </tr>
    <?php endwhile; ?>

</table>

<h3>Tổng tiền: <?= number_format($total) ?>đ</h3>
