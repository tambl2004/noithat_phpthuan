<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Thêm Sản Phẩm Mới</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?option=adminproductsstore">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Tên Sản Phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Giá <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="price" name="price" min="0" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Danh Mục</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="0">Chọn danh mục</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">URL Hình Ảnh</label>
                    <input type="url" class="form-control" id="image" name="image" 
                           placeholder="https://example.com/image.jpg">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Lưu
                </button>
                <a href="index.php?option=adminproducts" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Hủy
                </a>
            </div>
        </form>
    </div>
</div>

