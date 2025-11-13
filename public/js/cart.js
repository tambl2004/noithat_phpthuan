document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select-all');
    const btnSelectAll = document.getElementById('btn-select-all');
    const btnClearAll = document.getElementById('btn-clear-all');
    const itemCheckboxes = document.querySelectorAll('.item-checkbox');
    const cartForm = document.getElementById('cart-form');

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            itemCheckboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
        });
    }

    if (btnSelectAll) {
        btnSelectAll.addEventListener('click', function () {
            itemCheckboxes.forEach(cb => cb.checked = true);
            if (selectAllCheckbox) selectAllCheckbox.checked = true;
        });
    }

    if (btnClearAll) {
        btnClearAll.addEventListener('click', function () {
            itemCheckboxes.forEach(cb => cb.checked = false);
            if (selectAllCheckbox) selectAllCheckbox.checked = false;
        });
    }

    // Chặn submit khi không chọn item nào
    if (cartForm) {
        cartForm.addEventListener('submit', function (e) {
            const anyChecked = Array.from(itemCheckboxes).some(cb => cb.checked);
            if (!anyChecked) {
                e.preventDefault();
                alert('Vui lòng chọn ít nhất 1 sản phẩm để đặt hàng.');
            }
        });
    }
});
