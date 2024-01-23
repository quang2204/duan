<?php

require_once "../model/dn.php";


function checklogin($name, $password)
{
    $data = checkAuthen($name, $password);
    $namea = $data['name'];
    $passAuth = $data['password'];
    $role = $data['role'];

    echo $role;

    // echo $namea . "<br/>";
    // echo $passAuth . "<br/>";

    if ($name == $namea && $password == $passAuth) {
        $_SESSION['user'] = [
            'id' => $data['id'] ?? null,
            'username' => $data['username'] ?? null,
            'email' => $data['email'] ?? null,
            'address' => $data['address'] ?? null,
            'tel' => $data['tel'] ?? null,
            'image' => $data['image'] ?? null,

            'role' => $data['role'] ? $data['role'] : 0,
        ];

        if ($role == 1) {
            header("location: admin");
        } else {
            header("location: ?act=home");
        }
    }
    require_once 'admin/view/sign-in.php';

}