<?php

class AddressController extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?option=login");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $addressModel = new MyAddress();

        // xử lý thêm/sửa từ form POST ngay trên 1 trang
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $full_name = $_POST['full_name'];
            $phone     = $_POST['phone'];
            $address   = $_POST['address'];
            $is_default = isset($_POST['is_default']) ? 1 : 0;

            if (isset($_POST['id']) && $_POST['id']) {
                // update
                $id = (int)$_POST['id'];
                $addressModel->updateAddress($id, $user_id, $full_name, $phone, $address, $is_default);
            } else {
                // create
                $addressModel->createAddress($user_id, $full_name, $phone, $address, $is_default);
            }

            header("Location: index.php?option=diachi");
            exit;
        }

        // xóa
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = (int)$_GET['id'];
            $addressModel->deleteAddress($id, $user_id);
            header("Location: index.php?option=diachi");
            exit;
        }

        // đặt mặc định
        if (isset($_GET['action']) && $_GET['action'] == 'default') {
            $id = (int)$_GET['id'];
            $addressModel->setDefault($id, $user_id);
            header("Location: index.php?option=diachi");
            exit;
        }

        $data['addresses'] = $addressModel->getByUser($user_id);
        $this->render("address/index", $data);
    }
}
