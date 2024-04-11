<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/singin.css">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
        <div class="form-container">
            <form action="index.php?url=dang-ky-save" method="POST" enctype="multipart/form-data" >
                <h1>Tạo Tài Khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng email của bạn để đăng kí</span>
                <input type="text" name="kh_name" placeholder="Name">
                <input type="file" name="kh_avatar" type="text">
                <input type="email" name="kh_email" placeholder="Email">
                <input type="password" name="kh_password" placeholder="Password">
                <input type="sdt" name="kh_phone" placeholder="Số Điện Thoại">
                <button>ĐĂNG KÍ</button>
                
            </form>
        </div>
    </div>
</body>
</html>