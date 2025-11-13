<h2 class="mb-4">Địa chỉ của tôi</h2>

<div class="row">
    <div class="col-md-7">
        <h5>Danh sách địa chỉ</h5>
        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-light">
            <tr>
                <th>Họ tên</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Mặc định</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $addresses->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['full_name'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td>
                        <?php if ($row['is_default']): ?>
                            <span class="badge bg-success">Mặc định</span>
                        <?php else: ?>
                            <a href="index.php?option=diachi&action=default&id=<?= $row['id'] ?>" 
                               class="btn btn-sm btn-outline-secondary">
                                Đặt mặc định
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- nút Sửa: fill form bên phải -->
                        <button class="btn btn-sm btn-primary btn-edit"
                                data-id="<?= $row['id'] ?>"
                                data-name="<?= htmlspecialchars($row['full_name']) ?>"
                                data-phone="<?= htmlspecialchars($row['phone']) ?>"
                                data-address="<?= htmlspecialchars($row['address']) ?>"
                                data-default="<?= $row['is_default'] ?>">
                            Sửa
                        </button>
                        <a href="index.php?option=diachi&action=delete&id=<?= $row['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Xóa địa chỉ này?')">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="col-md-5">
        <h5 id="form-title">Thêm địa chỉ mới</h5>

        <form method="POST" class="card p-3 shadow-sm bg-white">
            <input type="hidden" name="id" id="addr_id">

            <div class="mb-3">
                <label>Họ tên người nhận</label>
                <input type="text" name="full_name" id="addr_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Số điện thoại</label>
                <input type="text" name="phone" id="addr_phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Địa chỉ chi tiết</label>
                <textarea name="address" id="addr_address" rows="3" class="form-control" required></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_default" id="addr_default">
                <label class="form-check-label" for="addr_default">
                    Đặt làm địa chỉ mặc định
                </label>
            </div>

            <button class="btn btn-success w-100">Lưu địa chỉ</button>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('.btn-edit').on('click', function () {
            $('#form-title').text('Sửa địa chỉ');
            $('#addr_id').val($(this).data('id'));
            $('#addr_name').val($(this).data('name'));
            $('#addr_phone').val($(this).data('phone'));
            $('#addr_address').val($(this).data('address'));
            $('#addr_default').prop('checked', $(this).data('default') == 1);
        });
    });
</script>
