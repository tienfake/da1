<?php
    session_start();
    ob_start();
    include('./../model/connect.php');
    include('./../model/category.php');
    include('./../model/product.php');
    include('./../model/size.php');
    include('./../model/order.php');
    include('./../model/user.php');
    include('./../model/thongke.php');
    include('./../helper/dd.php');
    include('./../helper/baseUrl.php');
    include('./../helper/route-menu-admin.php');


    include('./views/layouts/header.php');
    if(isset($_GET['url'])&&($_GET['url']!="")){
        switch($_GET['url']){
           // Trang danh sách danh mục
        case 'category':
            
            $error= '';
            $cates = getCateAll();
            include('./views/category/index.php');
            break;
         // Thêm danh mục
        case 'category-add':
           $cates = getCateAll();
            if(empty($_POST['dm_name'])){
                $error = 'Error';
            }else{
                insertCate($_POST['dm_name']);
            }

           header("location:".BASE_ADMIN."category");
           break;
          // Xóa danh mục
        case 'category-delete':
            $cates = getCateAll();
            if(isset($_GET['id'])){
              
              deleteCate($_GET['id']);
            }else{
              echo 'Error';
              die;
            }
            header("location:".BASE_ADMIN."category");
            break;
        // Sửa danh mục
        case 'category-edit':
            $error= '';
            $cates = getCateAll();
            if($_GET['id']){
               $cate = getFind($_GET['id']);
            //    dd($cate);
               include('./views/category/index.php');
            }else{
                echo 'ERROR';
                die;
            }
            break;
        // Trang lưu sửa
        case 'category-edit-save':
            $cates = getCateAll();
    
            if(!empty($_POST['dm_name']) && !empty($_POST['id'])){
                updateCate($_POST['dm_name'] ,$_POST['id']);
            }else{
                echo 'Chưa nhập gì !!!';
            die;
            }
            header("location:".BASE_ADMIN."category");
            break;
        // Trang sản phẩm
        case 'product':
            $product = getProductAll();
            include('./views/product/index.php');
        break;

        // Trang sản phẩm bình luận
        case 'product-cmtt':
          if(isset($_GET['id'])){
            $comments = getCommentProduct($_GET['id']);
          }
            include('./views/product/comment.php');
        break;

          // Xóa sản phẩm
          case 'product-cmtt-delete':
            if(isset($_GET['id'])){
               deleteCmtt($_GET['id']);
              header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            //   include('./views/product/comment.php');
          break;
        // Trang thêm sản phẩm
        case 'product-form-add':
            $size = getSizeAll();
            $cate = getCateAll();
            include('./views/product/form.php');
        break;
          // Lưu thêm sản phẩm
        case 'product-form-add-save':
            $size = getSizeAll();
            $cate = getCateAll();
            $errorName = '';
            $errorImage = '';
            $errorPrice = '';
            $errorCate = '';
            $errorPriceSale = ''; 
            $errorQuantity = '';
            $errorSize = '';
           
            if(!empty($_POST["sp_price"]) && !empty($_POST["sp_sale"])){
                if((int)$_POST["sp_price"]    < (int)$_POST["sp_sale"]){
                    $errorPriceSale = 'Giá giảm phải nhỏ hơn giá gốc !!!';
                }
            }
            if(!isset($_FILES["sp_image"]["name"])){
                $errorImage = "Bạn chưa chọn ảnh !!!";
            }
            if(empty($_POST["sp_price"])){
                $errorPrice = 'Bạn chưa nhập giá !!!';
            }
            if(empty($_POST["dm_id"])){
                $errorCate = 'Bạn chưa chọn danh mục !!!';
            }
            if( empty($_POST["kt_id"])){
                $errorSize = "Bạn chưa chọn kích thước !!!";
            }
            if(empty($_POST["sp_quantity"])){
                $errorQuantity = 'Chưa nhập số lượng !!!';
            }
            if(empty($_POST["sp_name"])){
                    $errorName = "Bạn chưa nhập tên sản phẩm !!!";
            }

            if(empty($errorSize) &&  empty($errorName) && empty($errorImage) && empty($errorPrice) && empty($errorCate) && empty($errorQuantity) && empty($errorPriceSale) ){
                $fileName =  $_FILES["sp_image"]["name"];
                // $fileName = !empty($_FILES["new_sp_image"]["name"]) ? $_FILES["new_sp_image"]["name"] : $_POST["sp_image_old"];

                move_uploaded_file( $_FILES["sp_image"]["tmp_name"]  ,'../upload/' .   $fileName );
                $_POST['sp_image'] =$fileName;
                insertProduct($_POST);
                header("location:".BASE_ADMIN."product");
            }else{
                include('./views/product/form.php');
            }
        break;
        case 'product-delete':
            if(isset($_GET['id'])){
                deleteProduct($_GET['id']);
              }else{
                echo 'Error';
                die;
              }
              header("location:".BASE_ADMIN."product");
              break;
        break;
        case 'product-edit':
            $size = getSizeAll();
            $cate = getCateAll();
            
            if(isset($_GET['id'])){
                $product = getProductFind($_GET['id']);
                include('./views/product/edit.php');
              }else{
                echo 'Error';
                die;
              }
              break;
        break;
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
            if(!empty($_POST["sp_price"]) && !empty($_POST["sp_sale"])){
                if((int)$_POST["sp_price"]    < (int)$_POST["sp_sale"]){
                    $errorPriceSale = 'Giá giảm phải lớn hơn giá gốc !!!';
                }
            }
            if(!isset($_FILES["sp_image"]["name"])){
                $errorImage = "Bạn chưa chọn ảnh !!!";
            }
            if(empty($_POST["sp_price"])){
                $errorPrice = 'Bạn chưa nhập giá !!!';
            }
            if (empty($_POST["sp_sale"])) {
                $errorPriceSale = 'Bạn chưa nhập giá giảm !!!';
            }
            if(empty($_POST["dm_id"])){
                $errorCate = 'Bạn chưa chọn danh mục !!!';
            }
            if( empty($_POST["kt_id"])){
                $errorSize = "Bạn chưa chọn kích thước !!!";
            }
            if(empty($_POST["sp_quantity"])){
                $errorQuantity = 'Chưa nhập số lượng !!!';
            }
            if(empty($_POST["sp_name"])){
                    $errorName = "Bạn chưa nhập tên sản phẩm !!!";
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
        // case 'order':
        //     $order = orderAll();
        //     include('./views/order/index.php');
        //     break;
        case 'order':
            $order = orderAll();

            $cancelledOrders = [];

            // Lọc danh sách đơn hàng có trạng thái chờ huỷ
            foreach ($order as $item) {
                if ($item['order_status'] == '5') {
                    $cancelledOrders[] = $item;
                }
            }

            include('./views/order/index.php');
            break;
        
        case 'update_order':
            $order = orderAll();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['newStatus']) && is_array($_POST['newStatus'])) {
                    foreach ($_POST['newStatus'] as $orderId => $newStatus) {
                        // Gọi hàm để cập nhật trạng thái
                        updateOrderStatus($orderId, $newStatus);
                    }
                }
            }
            
            header("location:".BASE_ADMIN."order");
            break;
       
           
        case 'order-delete-save':
            if(isset($_GET['id'])){
                orderDelete($_GET['id']);
            }
            header("location:".BASE_ADMIN."order");
            break; 

        // Chi tiết hóa đơn
        case 'order-detail':
            if(isset($_GET['id'])){
               $order =  getOrderByID($_GET['id']);
               $orderDetail = getOrderDetailByID($_GET['id']);
               include('./views/order/detail.php');
            }
            break;
            // Quản lý thuộc tính
        case 'propertie':
            $size = getSizeAll();
            include('./views/propertie/index.php');
            break;
        // Lưu thuộc tính thuộc tính
        case 'propertie-add-save':
            insertSize($_POST);
            header("location:".BASE_ADMIN."propertie");
            break;
         // Lưu thuộc tính thuộc tính
        case 'propertie-delete':
            if(isset($_GET['id'])){
                deleteSize($_GET['id']);
              }else{
                echo 'Error';
                die;
              }
            header("location:".BASE_ADMIN."propertie");
            break;
           // Trang sửa thuộc tính
        case 'propertie-edit':
            if(isset($_GET['id'])){
                $propertie =  getFindCate($_GET['id']); 
                $size = getSizeAll();              
              }else{
                echo 'Error';
                die;
              }
              include('./views/propertie/index.php');
            break;
        // case 'propertie-edit':
        //     if(isset($_GET['id'])){
        //         $propertie =  getFindCate($_GET['id']); 
        //         $size = getSizeAll();              
        //     }else{
        //          echo 'Error';
        //         die;
        // }
        //     include('./views/propertie/index.php');
        //     break;
        case 'propertie-edit-save':
            // dd($_POST);
            if(!empty($_POST)){
                updateSize($_POST);       
            }else{
                 echo 'Error';
                die;
            }
            header("location:".BASE_ADMIN."propertie");

            break;
            case 'account':
                $user = getAllUser();
        
                include('./views/account/index.php');
                break;
    
            case 'account-edit':
                $user = getUserId((int)$_GET['id']);
        
                include('./views/account/edit.php');
                break;
    
    
            case 'account-edit-save':
                updateUser($_POST);
                header("location:".BASE_ADMIN."account");
                break;
            case 'update-status':
                // Lấy dữ liệu từ form
                $orderId = $_POST['orderId'];
                $newStatus = $_POST['newStatus'];

                // Kiểm tra và làm sạch dữ liệu nếu cần

                // Cập nhật cơ sở dữ liệu
                // Giả sử $conn là biến kết nối của bạn
                $sql = "UPDATE ten_bang_don_hang SET trang_thai = '$newStatus' WHERE id_don_hang = $orderId";

                if ($conn->query($sql) === TRUE) {
                    echo "Cập nhật trạng thái thành công";
                } else {
                    echo "Lỗi khi cập nhật trạng thái: " . $conn->error;
                }

                case 'thong-kee':
                    $listthongke = thongKe();
                    include ('./views/thongke/doanhso.php');
                  
                    break;

                case 'bieudo':
                    $chart = cateChart();
                    include('./views/thongke/thongkesp.php');
                    break;
                    case 'bieudo2':
                        $sanphambanchay = spbanchay();
                        include('./views/thongke/spbanchay.php');
                        break;
                        case 'bieudo3':
                            $tongdoanhthu = thongke2();
                            include('./views/thongke/doanhthu.php');
                            break;
                // Đóng kết nối cơ sở dữ liệu nếu cần
            default:
                 # code..
                break;
        }
    }else if(isset($_SESSION["user"])){
        // Trang chính
        $chart = cateChart();
        include('./views/main.php');
    }else{
        header("location:".BASE_CLIENT."?dang-nhap");
    }
    
    include('./views/layouts/footer.php');
    
    ob_end_flush();
?>
