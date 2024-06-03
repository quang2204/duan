<?php
function check_online()
{

    if (isset ($_POST['cod'])) {
        $vnp_TxnRef = rand(00, 9999);
        pay(0, $vnp_TxnRef);
    } else if (isset ($_POST['redirect'])) {

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TxnRef = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://php.test/duanmau/?act=hoadon&id=" . $vnp_TxnRef;


        $vnp_TmnCode = "KTI4SAMY";//Mã website tại VNPAY 
        $vnp_HashSecret = "TPTPCMZPWRXPDECVBKUYOSBONBALOCEA"; //Chuỗi bí mật

        //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Nội dung thanh toán';
        $vnp_OrderType = 'biklpaymen';
        $vnp_Amount = $_POST['total'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'ncb';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset ($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,

            "vnp_TxnRef" => $vnp_TxnRef,

            // "vnp_ExpireDate" => $vnp_ExpireDate,
            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vn|p_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset ($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset ($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset ($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );
        if (isset ($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            pay(1, $vnp_TxnRef);
            die();
        } else {
            echo json_encode($returnData);
        }

    } elseif (isset ($_POST['payUrl'])) {
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                )
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total'];
        $orderId = rand(00, 9999);
        $redirectUrl = "http://php.test/duanmau/?act=hoadon&id=" . $orderId;
        $ipnUrl = "http://php.test/duanmau/?act=hoadon&id=" . $orderId;
        $extraData = "";



        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        $pay = 2;
        //Just a example, please check more in there
        if (empty ($_POST['name']) || strlen($_POST['name']) < 5 || strlen($_POST['name']) > 30) {
            $_SESSION['error']['name'] = 'Tên từ 5 đến 30 ký tự';
        } else {
            unset($_SESSION['error']['name']);
        }

        if (empty ($_POST['dc']) || strlen($_POST['dc']) < 5 || strlen($_POST['dc']) > 50) {
            $_SESSION['error']['dc'] = 'Địa chỉ từ 5 đến 50 ký tự';
        } else {
            unset($_SESSION['error']['dc']);
        }

        if (empty ($_POST['sdt'])) {
            $_SESSION['error']['sdt'] = 'Bắt buộc nhập số điện thoại';
        } else {
            $phoneNumber = $_POST['sdt'];
            $pattern = '/^[0-9]{10,15}$/';
            if (!preg_match($pattern, $phoneNumber)) {
                $_SESSION['error']['sdt'] = 'Định dạng số điện thoại không hợp lệ';
            } else {
                unset($_SESSION['error']['sdt']);
            }
        }

        if (empty ($_SESSION['error'])) {
            $name = $_POST['name'];
            $total = $_POST['total'];
            $date = date("Y-m-d");
            $sql = 'INSERT INTO orders(id,name, phone, address, note, total, created_time, id_us,pay)
                        VALUES(:id,:name, :phone, :address, :note, :total, :created_time, :id_us,:pay)';
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $_POST['sdt']);
            $stmt->bindParam(':address', $_POST['dc']);
            $stmt->bindParam(':note', $_POST['note']);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':created_time', $date);
            $stmt->bindParam(':id_us', $_POST['user']);
            $stmt->bindParam(':id', $orderId);

            $stmt->bindParam(':pay', $pay);
            $stmt->execute();
            if ($stmt) {


                foreach ($_SESSION['cart']['buy'] as $value) {
                    $sql_order_detail = '
                        INSERT INTO order_detail(order_id, quantity, price, id_product,colors,sizes,name)
                        VALUES(:order_id, :quantity, :price, :id_product,:colors,:sizes,:name)';
                    $stmt_order_detail = $GLOBALS['conn']->prepare($sql_order_detail);
                    $stmt_order_detail->bindParam(':order_id', $orderId);
                    $stmt_order_detail->bindParam(':quantity', $value['sl']);
                    $stmt_order_detail->bindParam(':name', $value['name']);
                    $stmt_order_detail->bindParam(':price', $value['tong']);
                    $stmt_order_detail->bindParam(':id_product', $value['id']);
                    $stmt_order_detail->bindParam(':colors', $value['color']);
                    $stmt_order_detail->bindParam(':sizes', $value['size']);
                    $stmt_order_detail->execute();
                }
                foreach ($_SESSION['cart']['buy'] as $value) {
                    $sqlupdate = 'UPDATE sanpham 
                                      SET quantity = quantity - :quantity
                                      WHERE id = :id';

                    $stmtupdate = $GLOBALS['conn']->prepare($sqlupdate);
                    $stmtupdate->bindParam(':quantity', $value['sl']);
                    $stmtupdate->bindParam(':id', $value['id']);
                    $stmtupdate->execute();
                }

            }
            $to = $_POST['email'];
            $key = 1;
            $subject = "Đặt hàng Thành công";
            $body = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .table-responsive {
            max-width: 600px;
        }

        .table td,
        .table th {
            padding: 0.75rem 0;
            vertical-align: top;
            border: 0;
        }

        .container {
            margin: auto;
            width: 600px;
        }

        .col {
            width: 300px;
            text-align: left;
        }

        .img {
            margin: 20px 0;
            line-height: 2;
            
        }

        th {
            text-align: left;
        }
        
        .img img {
            margin: auto;
            margin-bottom: 30px;
            display: block;
        }

        .img p {
            text-align: left;
        }
    .red{
        color: red;
    }
    hr{
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="img">
        <img src="https://home.quangluong.id.vn/view/images/icons/logo-01.png">
            <p>
                Xin chào ' . ($name) . ',
            </p>
            <p >
                Đơn hàng <strong class="red">#' . ($orderId) . '</strong> của bạn đã đặt thành công ngày ' . ($date) . '.
            </p>
        </div>
        <hr>
        <div class="conten">
            <h4>
                <strong>
                    THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA
                </strong>
            </h4>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td scope="col" class="col" >
                            Mã đơn hàng:
                        </td>
                        <td scope="col" class="col red">#' . ($orderId) . '</td>
                    </tr>
                    <tr>
                        <td scope="col" class="col">
                            Ngày đặt hàng:
                        </td>
                        <td scope="col" class="col ">' . ($date) . '</td>
                    </tr>
                </table>';

            foreach ($_SESSION['cart']['buy'] as $value) {
                $body .= '<table class="table">
                    <tr>
                        <td class="th"><img src="https://home.quangluong.id.vn/admin/' . $value['img'] . '" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">' . ($key++) . '.' . ($value['name']) . '</td>
                    </tr>
                    <tr>
                        <td id="th" style="width: 300px;" >Size:</td>
                        <td class="th">' . ($value['size']) . '</td>
                    </tr>   
                    <tr>
                    <td id="th"  >Color:</td>
                    <td class="th">' . ($value['color']) . '</td>
                </tr>
                    <tr>
                        <td class="th">Số lượng:</td>
                        <td class="th">' . ($value['sl']) . '</td>
                    </tr>
                    <tr>
                        <td class="th">Giá:</td>
                        <td class="th">' . (number_format($value['tong'], 0, 0, )) . '</td>
                    </tr>
                </table>
                <hr>
               ';
            }

            $body .= '
            <table class="table">
                <tr>
                    <td style="width: 300px;" >Phí vận chuyển:</td>
                    <td>30.000 đ</td>
                </tr>
                <tr>
                    <td>Tổng thanh toán:</td>
                    <td>' . (number_format($total, 0, 0, )) . '</td>
                </tr>
                
            </table>
                </div>
        </div>
    </div>
</body>

</html>';

            sendmail($to, $subject, $body);
            unset($_SESSION['cart']);
            header('Location: ' . $jsonResult['payUrl']);

        }

    }

}