<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Thêm Danh Mục Mới</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?option=admincategoriesstore">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Danh Mục <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Lưu
                </button>
                <a href="index.php?option=admincategories" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Hủy
                </a>
            </div>
        </form>
    </div>
</div>

