<h2>Danh sách sản phẩm</h2>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $item): ?>
            <li>
                <a href="index.php?option=chitietsanpham&id=<?= $item['id'] ?>">
                    <?= $item['name'] ?> - <?= number_format($item['price']) ?>đ
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Không có sản phẩm</p>
<?php endif; ?>
