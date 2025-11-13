<div class="row g-4 mb-4">
    <!-- Thống kê -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Tổng Sản Phẩm</h6>
                        <h3 class="mb-0"><?= $totalProducts ?? 0 ?></h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-box fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Danh Mục</h6>
                        <h3 class="mb-0"><?= $totalCategories ?? 0 ?></h3>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="fas fa-tags fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Tổng Người Dùng</h6>
                        <h3 class="mb-0"><?= $totalUsers ?? 0 ?></h3>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Doanh Thu</h6>
                        <h3 class="mb-0"><?= number_format($totalRevenue ?? 0, 0, ',', '.') ?> đ</h3>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Đơn hàng gần đây -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Đơn Hàng Gần Đây</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($recentOrders)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người Dùng</th>
                        <th>Tổng Tiền</th>
                        <th>Phương Thức</th>
                        <th>Trạng Thái</th>
                        <th>Ngày Tạo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentOrders as $order): ?>
                    <tr>
                        <td>#<?= $order['id'] ?></td>
                        <td>User ID: <?= $order['user_id'] ?></td>
                        <td><?= number_format($order['total_price'], 0, ',', '.') ?> đ</td>
                        <td><?= $order['payment_method'] ?></td>
                        <td>
                            <span class="badge bg-<?= $order['status'] == 'completed' ? 'success' : 'warning' ?>">
                                <?= $order['status'] ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <p class="text-muted text-center py-4">Chưa có đơn hàng nào</p>
        <?php endif; ?>
    </div>
</div>

