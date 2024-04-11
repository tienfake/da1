<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Document</title>
</head>
<style>
    
</style>
<body>
<div class="container" id="container">
        <div class="form-container">
            <form action="index.php?url=dang-nhap-save" method="POST" enctype="multipart/form-data">
                <h1>ĐĂNG NHẬP</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng mật khẩu email của bạn</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Quên Mật Khẩu?</a>
                <button>ĐĂNG NHẬP</button>
                <a href="?dang-ky">ĐĂNG KÝ</a>
            </form>
        </div>


    </div>
</body>
</html>