<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh Sách Sản Phẩm</h4>
    <a href="index.php?option=adminproductscreate" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Thêm Sản Phẩm
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <?php if (!empty($products)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Danh Mục</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td>
                            <?php if (!empty($product['image'])): ?>
                                <img src="<?= htmlspecialchars($product['image']) ?>" 
                                     alt="<?= htmlspecialchars($product['name']) ?>"
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px; border-radius: 5px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
                        <td>ID: <?= $product['category_id'] ?? 'N/A' ?></td>
                        <td>
                            <a href="index.php?option=adminproductsedit&id=<?= $product['id'] ?>" 
                               class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="index.php?option=adminproductsdelete&id=<?= $product['id'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <p class="text-muted text-center py-4">Chưa có sản phẩm nào</p>
        <?php endif; ?>
    </div>
</div>

