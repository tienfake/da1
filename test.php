<?php case 'product-edit-save':
    $size = getSizeAll();
    $cate = getCateAll();
    $errorName = '';
    $errorImage = '';
    $errorPrice = '';
    $errorCate = '';
    $errorPriceSale = ''; 
    $errorQuantity = '';
    $errorSize = '';
    $product = getProductFind($_POST['sp_id']);

    // Thêm điều kiện kiểm tra nếu người dùng chọn ảnh mới
    if (!empty($_FILES["sp_image"]["name"])) {
        $fileName = $_FILES["sp_image"]["name"];
        $tmpFilePath = $_FILES["sp_image"]["tmp_name"];

        // Di chuyển tệp
        $destinationPath = '../upload/' . $fileName;
        if (move_uploaded_file($tmpFilePath, $destinationPath)) {
            $_POST['sp_image'] = $fileName;
        } else {
            $errorImage = "Không thể di chuyển tệp!";
        }
    } else {
        // Nếu không chọn ảnh mới, giữ nguyên ảnh cũ
        $_POST['sp_image'] = $product[0]["sp_image"];
    }

    // Tiếp tục với các điều kiện kiểm tra khác
    // ...

    if (empty($errorSize) && empty($errorName) && empty($errorImage) && empty($errorPrice) && empty($errorCate) && empty($errorQuantity) && empty($errorPriceSale)) {
        // Hàm cập nhật sản phẩm với thông tin mới
        updateProduct($_POST, $_POST['sp_id']);
        header("location:".BASE_ADMIN."product");
    } else {
        include('./views/product/edit.php');
    }
    break;




    <td>
    if (!empty($item['sp_sale'])) {
        echo number_format((float)$item['sp_sale'], 0, ",", ".") . 'đ';
    } else {
        echo '<span class="text-danger">Chưa nhập giá giảm</span>';
    }
    </td>

    case 'product-edit-save':
        $size = getSizeAll();
        $cate = getCateAll();
        $errorName = '';
        $errorImage = '';
        $errorPrice = '';
        $errorCate = '';
        $errorPriceSale = ''; 
        $errorQuantity = '';
        $errorSize = '';
        $product = getProductFind($_POST['sp_id']);
    
        // Kiểm tra nếu giá giảm đã được nhập và không phải là chuỗi trống
        if (!empty($_POST["sp_price"]) && !empty($_POST["sp_sale"])) {
            if ((float)$_POST["sp_price"] < (float)$_POST["sp_sale"]) {
                $errorPriceSale = 'Giá giảm phải nhỏ hơn giá gốc !!!';
            }
        }
    
        // Thêm điều kiện kiểm tra nếu giá giảm không được nhập
        if (empty($_POST["sp_sale"])) {
            $errorPriceSale = 'Bạn chưa nhập giá giảm !!!';
        }
    
        // Thêm điều kiện kiểm tra nếu người dùng chọn ảnh mới
        if (!empty($_FILES["sp_image"]["name"])) {
            $fileName = $_FILES["sp_image"]["name"];
            $tmpFilePath = $_FILES["sp_image"]["tmp_name"];
    
            // Di chuyển tệp
            $destinationPath = '../upload/' . $fileName;
            if (move_uploaded_file($tmpFilePath, $destinationPath)) {
                $_POST['sp_image'] = $fileName;
            } else {
                $errorImage = "Không thể di chuyển tệp!";
            }
        } else {
            // Nếu không chọn ảnh mới, giữ nguyên ảnh cũ
            $_POST['sp_image'] = $product[0]["sp_image"];
        }
    
        // Tiếp tục với các điều kiện kiểm tra khác
        // ...
    
        if (empty($errorSize) && empty($errorName) && empty($errorImage) && empty($errorPrice) && empty($errorCate) && empty($errorQuantity) && empty($errorPriceSale)) {
            // Hàm cập nhật sản phẩm với thông tin mới
            updateProduct($_POST, $_POST['sp_id']);
            header("location:".BASE_ADMIN."product");
        } else {
            include('./views/product/edit.php');
        }
        break;
    

?>