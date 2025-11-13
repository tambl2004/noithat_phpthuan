<?php

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $u = $user->findByEmail($email);

            if ($u && password_verify($password, $u['password'])) {

                $_SESSION['user_id'] = $u['id'];
                $_SESSION['user_name'] = $u['name'];

                header("Location: index.php?option=home");
                exit;
            } else {
                $data['error'] = "Email hoặc mật khẩu không đúng!";
                return $this->render("auth/login", $data);
            }
        }

        $this->render("auth/login");
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();

            // kiểm tra email trùng
            if ($user->findByEmail($email)) {
                $data['error'] = "Email đã tồn tại!";
                return $this->render("auth/register", $data);
            }

            $user->create($name, $email, $password);

            $data['success'] = "Đăng ký thành công! Mời bạn đăng nhập.";
            return $this->render("auth/login", $data);
        }

        $this->render("auth/register");
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?option=home");
    }
}
