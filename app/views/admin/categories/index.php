<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh Sách Danh Mục</h4>
    <a href="index.php?option=admincategoriescreate" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Thêm Danh Mục
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <?php if (!empty($categories)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh Mục</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?= $cat['id'] ?></td>
                        <td><?= htmlspecialchars($cat['name']) ?></td>
                        <td>
                            <a href="index.php?option=admincategoriesdelete&id=<?= $cat['id'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <p class="text-muted text-center py-4">Chưa có danh mục nào</p>
        <?php endif; ?>
    </div>
</div>

