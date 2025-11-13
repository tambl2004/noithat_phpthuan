<?php if (!empty($_SESSION['cart_error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['cart_error']; unset($_SESSION['cart_error']); ?>
    </div>
<?php endif; ?>

<h2>Giỏ hàng</h2>

<?php if (empty($cartItems)): ?>
    <p>Giỏ hàng của bạn đang trống.</p>
<?php else: ?>

<form id="cart-form" action="index.php?controller=cart&action=checkoutSelected" method="post">
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width:40px;">
                    <input type="checkbox" id="select-all">
                </th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th style="width:140px;">Số lượng</th>
                <th>Thành tiền</th>
                <th style="width:80px;">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
        <?php foreach ($cartItems as $item): 
            $subtotal = $item['quantity'] * $item['product_price'];
            $total += $subtotal;
        ?>
            <tr>
                <td class="text-center">
                    <input type="checkbox" 
                           class="item-checkbox" 
                           name="selected_items[]" 
                           value="<?= $item['id'] ?>">
                </td>
                <td><?= htmlspecialchars($item['product_name']) ?></td>
                <td style="width:100px;">
                    <img src="<?= htmlspecialchars($item['image']) ?>" 
                         class="img-fluid rounded" 
                         style="max-height:70px; object-fit:cover;">
                </td>
                <td><?= number_format($item['product_price']) ?> ₫</td>
                <td>
                    <div class="d-flex align-items-center">
                        <form action="index.php?controller=cart&action=updateQuantity"
                              method="post" class="me-1">
                            <input type="hidden" name="cart_item_id" value="<?= $item['id'] ?>">
                            <input type="hidden" name="type" value="dec">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">−</button>
                        </form>

                        <input type="text" 
                               class="form-control form-control-sm text-center" 
                               value="<?= $item['quantity'] ?>" 
                               readonly style="width:50px;">

                        <form action="index.php?controller=cart&action=updateQuantity"
                              method="post" class="ms-1">
                            <input type="hidden" name="cart_item_id" value="<?= $item['id'] ?>">
                            <input type="hidden" name="type" value="inc">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                        </form>
                    </div>
                </td>
                <td><?= number_format($subtotal) ?> ₫</td>
                <td class="text-center">
                    <a href="index.php?controller=cart&action=remove&id=<?= $item['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng?')">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-end">Tổng tạm tính (tất cả sản phẩm trong giỏ):</th>
                <th colspan="2"><?= number_format($total) ?> ₫</th>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-between">
        <div>
            <button type="button" class="btn btn-outline-secondary" id="btn-select-all">
                Chọn tất cả
            </button>
            <button type="button" class="btn btn-outline-secondary ms-2" id="btn-clear-all">
                Bỏ chọn tất cả
            </button>
        </div>

        <button type="submit" class="btn btn-primary">
            Đặt hàng các sản phẩm đã chọn
        </button>
    </div>
</form>

<?php endif; ?>
