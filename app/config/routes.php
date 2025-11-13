<?php

$routes = [

    // CLIENT
    'home' => [
        'controller' => 'HomeController',
        'action' => 'index'
    ],

    'sanpham' => [
        'controller' => 'ProductController',
        'action' => 'index'
    ],

    'chitietsanpham' => [
        'controller' => 'ProductController',
        'action' => 'detail'
    ],

    // giỏ hàng
    'giohang' => [
    'controller' => 'CartController',
    'action' => 'index'
    ],

    'themgiohang' => [
        'controller' => 'CartController',
        'action' => 'add'
    ],

    'xoagiohang' => [
        'controller' => 'CartController',
        'action' => 'remove'
    ],
    // đăng nhập , đăng ký, quên mật khẩu
   'login' => [
    'controller' => 'AuthController',
    'action' => 'login'
    ],

    'register' => [
        'controller' => 'AuthController',
        'action' => 'register'
    ],

    'logout' => [
        'controller' => 'AuthController',
        'action' => 'logout'
    ],

    // địa chỉ và thanh toán
    'diachi' => [
    'controller' => 'AddressController',
    'action' => 'index'
    ],

    'thanhtoan' => [
        'controller' => 'CheckoutController',
        'action' => 'index'
    ],

    // ADMIN
    'admin' => [
        'controller' => 'AdminController',
        'action' => 'dashboard'
    ]
];
