<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = array();

    if (strlen($_POST['name']) < 5 || strlen($_POST['name']) > 50) {
        $errors['name'] = 'Tên từ 4->30';
    }

    if (empty($_POST['dc'])) {
        $errors['dc'] = 'Bắt buộc nhập địa chỉ';
    }

    if (empty($_POST['tp'])) {
        $errors['tp'] = 'Bắt buộc nhập tỉnh thành phố';
    }

    if (empty($_POST['sdt'])) {
        $errors['sdt'] = 'Bắt buộc nhập số điện thoại';
    } else {
        $phoneNumber = $_POST['sdt'];

        $pattern = '/^[0-9]{10,15}$/';
        if (!preg_match($pattern, $phoneNumber)) {
            $errors['sdt'] = 'Định dạng số điện thoại không hợp lệ';
        }
    }



    echo json_encode(array('status' => 'error', 'errors' => $errors));

}
