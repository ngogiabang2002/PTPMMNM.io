<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="icon" href="app/image/apple.png">

    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=".../app/css/styles.css">
    <!-- Kết nối với thư viện Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header class="text-white text-center " style="display:flex;background-color:#A9A8A8;padding: 0 124px;">

        <img src="app/image/logoaps.png" style="height: 30px;margin: 50px 0px;width: 10%;"/>
        <div style="display: flex;width: 90%;
    margin-bottom: 25px;">
        <form action="/php/product/search" method="GET" class="form-inline" style="display: flex;">
            <input type="text" name="keyword" class="form-control" placeholder="Search ..."
                style="width: 750px; margin: 50px 0 50px 50px;">
            <button type="submit" class="btn btn-light" style="margin: 50px 50px 50px 0;"><i
                    class="fas fa-search"></i></button>
            <a class="nav-link text-white position-relative" href="/php/shoppingcart" style="margin: 50px 0;">
                <i class="fas fa-shopping-cart" style="font-size: 22px;"></i>
                <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle" style="font-size: 12px;">3</span>
            </a>
        <a style="margin: 50px 10px;"><?php include_once 'app/views/share/auth.php'?></a>
        </form>


        </div>
        
    </header>

    <!-- Menu điều hướng sử dụng Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background-color:#848484;margin-top: -50px;padding-bottom: 20px; ">
        <div class="container mt-3" >

            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: center;" >
                <ul class="navbar-nav">
                    <li class="nav-item navbar-brand">
                        <a class="navbar-brand" href="/php" >Trang Chủ</a>
                    </li>
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="/php">Sản Phẩm</a>
                    </li>
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="#">Liên Hệ</a>
                    </li>
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="shoppingcart/orderHistory">Đơn đã đặt</a>
                    </li>

                   
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-9">



