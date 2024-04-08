<?php
ob_start();

function addsp()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // validate();
            // if (empty($_SESSION['error'])) {

            $sql = "INSERT INTO sanpham (name, price, img, iddm, motact, status, quantity)
                        VALUES (:name, :price, :img, :iddm, :motact, 1,:quantity)";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':price', $_POST['price']);

            $stmt->bindParam(':iddm', $_POST['iddm']);
            $stmt->bindParam(':motact', $_POST['motact']);
            $stmt->bindParam(':quantity', $_POST['quantity']);


            $img = $_FILES['img'] ?? null;
            $pathSaveDB = '';

            // Xử lý upload ảnh
            if ($img) {
                $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                // Upload file lên để lưu trữ
                if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                    $pathSaveDB = 'upload/' . $img['name'];
                }
            }

            $stmt->bindParam(':img', $pathSaveDB);

            $stmt->execute();

            $lastId = $GLOBALS['conn']->lastInsertId();

            // $selectedColors = $_POST['color'];
            // $selectedSizes = $_POST['size'];

            // $colorSizeCombinations = array_map(null, $selectedColors, $selectedSizes);

            // foreach ($colorSizeCombinations as $combination) {
            //     list($color, $size) = $combination;

            //     $sql = "INSERT INTO product_variants (id_product, id_colors, id_sizes)
            //                 VALUES (:id_product, :id_colors, :id_sizes)";

            //     $stmtVariant = $GLOBALS['conn']->prepare($sql);
            //     $stmtVariant->bindParam(':id_product', $lastId);
            //     $stmtVariant->bindParam(':id_colors', $color);
            //     $stmtVariant->bindParam(':id_sizes', $size);
            //     $stmtVariant->execute();
            // }
            $_SESSION['add'] = [
                'size' => $_POST['size'],
                'color' => $_POST['color'],

                'img' => $_FILES['imgs']
            ];
            if (isset($_FILES['imgs']) && !empty($_FILES['imgs'])) {

                foreach ($_FILES['imgs']['tmp_name'] as $key => $tmp_name) {

                    if (!empty($tmp_name)) {
                        $albumImg = $_FILES['imgs']['name'][$key];
                        $pathUploadAlbum = __DIR__ . '/../upload/' . $albumImg;

                        if (move_uploaded_file($tmp_name, $pathUploadAlbum)) {
                            $pathSaveDBAlbum = 'upload/' . $albumImg;

                            $color = $_POST['color'][$key];
                            $size = $_POST['size'][$key];

                            $sql = 'INSERT INTO product_variants (id_product, id_colors, id_sizes, img) 
                        VALUES (:id_product, :id_colors, :id_sizes, :img)';
                            $stmtVariant = $GLOBALS['conn']->prepare($sql);
                            $stmtVariant->bindParam(':id_product', $lastId);
                            $stmtVariant->bindParam(':id_colors', $color);
                            $stmtVariant->bindParam(':id_sizes', $size);

                            $stmtVariant->bindParam(':img', $pathSaveDBAlbum);
                            $stmtVariant->execute();
                        } else {
                            // Handle file upload error
                            echo 'Failed to move uploaded file.';
                        }
                    }
                }
            } else {
                // Handle case where no images were uploaded
                echo 'No images uploaded.';
            }


            $albumImages = $_FILES['anh'];
            $sqlImg = "INSERT INTO img (id_product, img) 
                           VALUES (:id_product, :img)";
            // Tiến hành chèn dữ liệu vào bảng img (album)
            foreach ($albumImages['tmp_name'] as $key => $tmp_name) {
                if (!empty($tmp_name)) {
                    $albumImg = $_FILES['anh']['name'][$key];
                    $pathUploadAlbum = __DIR__ . '/../upload/' . $albumImg;
                    if (move_uploaded_file($tmp_name, $pathUploadAlbum)) {
                        $pathSaveDBAlbum = 'upload/' . $albumImg;

                        // Chuẩn bị và thực thi câu lệnh SQL để chèn dữ liệu vào bảng img
                        $stmtImg = $GLOBALS['conn']->prepare($sqlImg);
                        $stmtImg->bindParam(':id_product', $lastId);
                        $stmtImg->bindParam(':img', $pathSaveDBAlbum);
                        $stmtImg->execute();
                    }
                }
            }
            header('Location:?act=sanpham'); // Replace with your success page
            exit(); // Thêm dòng này để dừng việc thực thi kịch bản sau khi chuyển hướng
            // }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
// function validate()
// {
//     if (empty($_POST['size'])) {
//         $_SESSION['error']['size'] = 'Chọn 1 loại size';
//     } else {
//         unset($_SESSION['error']['size']);
//     }
//     if (empty($_POST['color'])) {
//         $_SESSION['error']['color'] = 'Chọn 1 loại color';
//     } else {
//         unset($_SESSION['error']['color']);
//     }

// }


function updatebt()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Tạo câu lệnh SQL cơ bản
            $sql = "UPDATE product_variants 
                    SET 
                    id_colors = :id_colors,
                   
                    id_sizes = :id_sizes";

            // Kiểm tra xem có ảnh mới được tải lên không
            $img = $_FILES['img'] ?? null;
            $pathSaveDB = $_POST['img-current'] ?? '';

            if ($img && $img['size'] > 0) {
                // Nếu có ảnh mới, thêm cột img vào câu lệnh SQL và xử lý đường dẫn
                $sql .= ", img = :img";
                $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                // Upload file lên để lưu trữ
                if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                    $pathSaveDB = 'upload/' . $img['name'];

                    // Xóa ảnh cũ nếu có
                    if ($_POST['img-current'] && $_POST['img-current'] != $pathSaveDB) {
                        unlink(__DIR__ . '/../' . $_POST['img-current']);
                    }
                }
            }

            // Hoàn thành câu lệnh SQL
            $sql .= " WHERE id = :id";

            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_colors', $_POST['color']);
            $stmt->bindParam(':id_sizes', $_POST['size']);


            // Bind đường dẫn ảnh mới nếu có
            if ($img && $img['size'] > 0) {
                $stmt->bindParam(':img', $pathSaveDB);
            }

            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            header('Location: ?act=attribute&id=' . $_POST['idproduct']);
            exit; // Kết thúc script ngay sau khi chuyển hướng
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            exit; // Kết thúc script nếu có lỗi xảy ra
        }
    }
}


// function validate()
// {
//     if (empty($_POST['size'])) {
//         $_SESSION['error']['size'] = 'Chọn 1 loại size';
//     } else {
//         unset($_SESSION['error']['size']);
//     }
//     if (empty($_POST['color'])) {
//         $_SESSION['error']['color'] = 'Chọn 1 loại color';
//     } else {
//         unset($_SESSION['error']['color']);
//     }

// }
function addattribute()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $_SESSION['add'] = [
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'img' => $_FILES['imgs']
            ];
            if (isset($_FILES['imgs']) && !empty($_FILES['imgs'])) {

                foreach ($_FILES['imgs']['tmp_name'] as $key => $tmp_name) {

                    if (!empty($tmp_name)) {
                        $albumImg = $_FILES['imgs']['name'][$key];
                        $pathUploadAlbum = __DIR__ . '/../upload/' . $albumImg;

                        if (move_uploaded_file($tmp_name, $pathUploadAlbum)) {
                            $pathSaveDBAlbum = 'upload/' . $albumImg;

                            $color = $_POST['color'][$key];
                            $size = $_POST['size'][$key];

                            $sql = 'INSERT INTO product_variants (id_product, id_colors, id_sizes,  img) 
                        VALUES (:id_product, :id_colors, :id_sizes,  :img)';
                            $stmtVariant = $GLOBALS['conn']->prepare($sql);
                            $stmtVariant->bindParam(':id_product', $_GET['id']);
                            $stmtVariant->bindParam(':id_colors', $color);
                            $stmtVariant->bindParam(':id_sizes', $size);

                            $stmtVariant->bindParam(':img', $pathSaveDBAlbum);
                            $stmtVariant->execute();
                        } else {
                            // Handle file upload error
                            echo 'Failed to move uploaded file.';
                        }
                    }
                }
            } else {
                // Handle case where no images were uploaded
                echo 'No images uploaded.';
            }

            header('Location:?act=attribute&id=' . $_GET['id']); // Replace with your success page
            exit();
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}