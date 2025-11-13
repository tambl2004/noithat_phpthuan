<h2 class="mb-4">Thanh toán</h2>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-md-7">
        <h5>Thông tin đơn hàng</h5>
        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-light">
            <tr>
                <th>Sản phẩm</th>
                <th>SL</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $row): ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= number_format($row['price']) ?>đ</td>
                    <td><?= number_format($row['subtotal']) ?>đ</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h4 class="text-end mt-3">
            Tổng tiền: <span class="text-danger fw-bold"><?= number_format($total) ?>đ</span>
        </h4>
    </div>

    <div class="col-md-5">
        <h5>Thông tin giao hàng & thanh toán</h5>

        <form method="POST" class="card p-3 shadow-sm bg-white">

            <div class="mb-3">
                <label class="fw-bold mb-2">Chọn địa chỉ giao hàng</label>
                <div class="border rounded p-2" style="max-height: 220px; overflow-y:auto;">
                    <?php 
                    $hasAddress = false;
                    while ($addr = $addresses->fetch_assoc()):
                        $hasAddress = true;
                    ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" 
                                   name="address_id" 
                                   value="<?= $addr['id'] ?>"
                                   id="addr_<?= $addr['id'] ?>"
                                <?= ($defaultAddress && $defaultAddress['id'] == $addr['id']) ? 'checked' : '' ?>
                            >
                            <label class="form-check-label" for="addr_<?= $addr['id'] ?>">
                                <b><?= $addr['full_name'] ?></b> - <?= $addr['phone'] ?><br>
                                <?= $addr['address'] ?>
                                <?php if ($addr['is_default']): ?>
                                    <span class="badge bg-success ms-1">Mặc định</span>
                                <?php endif; ?>
                            </label>
                        </div>
                    <?php endwhile; ?>

                    <?php if (!$hasAddress): ?>
                        <p class="text-muted">Bạn chưa có địa chỉ nào. 
                            <a href="index.php?option=diachi">Thêm địa chỉ ngay</a>.
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="fw-bold mb-2">Hình thức thanh toán</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="pm_cod" value="COD" checked>
                    <label class="form-check-label" for="pm_cod">
                        Thanh toán khi nhận hàng (COD)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="pm_momo" value="MOMO">
                    <label class="form-check-label" for="pm_momo">
                        MoMo (giả lập – chưa tích hợp cổng thanh toán)
                    </label>
                </div>
            </div>

            <button class="btn btn-primary w-100 btn-lg" <?= empty($items) ? 'disabled' : '' ?>>
                Xác nhận đặt hàng
            </button>

            <p class="mt-3 text-muted" style="font-size: 0.9rem;">
                * Với MoMo: hệ thống chỉ ghi nhận phương thức, chưa tích hợp thanh toán online thực tế.
            </p>

        </form>
    </div>
</div>
