<?php
include_once 'app/views/share/header.php';

// Lấy danh sách loại sản phẩm từ model
$categories = $this->productModel->getAllCategories();

// Tính toán số lượng sản phẩm trên mỗi trang
$itemsPerPage = 6;

// Tính tổng số lượng sản phẩm
$totalProducts = $this->productModel->getTotalProducts();

// Tính toán tổng số trang
$totalPages = ceil($totalProducts / $itemsPerPage);

// Xác định trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán offset cho truy vấn SQL
$start = ($page - 1) * $itemsPerPage;

// Lấy danh sách sản phẩm cho trang hiện tại
$products = $this->productModel->getProductsPaginated($start, $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin thanh toán</title>
    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Sử dụng thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/php/app/css/styles.css">
</head>

<body>
<div class="col-md-3">
    <div class="banner" style="background-image: url('app/image/banneriphone.png'); width: 1300px; height: 500px;  background-size: cover; background-position: center; position: relative;">

        <p class="text-center text-white" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); padding: 10px; font-size: 24px;">
            Apple Store</br>
            Nơi tuyệt vời để nhìn, chạm và khám phá
        </p>
    </div>


    </div>
    <div class="container">
        <div class="row">
            <!-- Cột danh mục sản phẩm chiếm 20% -->
            <div class="col-md-3">
                <div class="p-3">
                    <div class=" text-white p-3 rounded" style="background-color: #989898;">
                        <h5 class="text-center">LOẠI SẢN PHẨM</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="/php/product/category/<?= $category['id'] ?>"
                                    class="d-block text-white py-2 px-3 mb-2 rounded category-button"><?= $category['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Cột danh sách sản phẩm chiếm 80% -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4 " style="width: 1000px; height:100%;" >
                    <?php foreach ($products as $row): ?>
                    <div class="col">
                        <div class="product-card">
                            <div class="card" >
                                <img src="/php/<?= $row['image']; ?>" class="card-img-top" alt="..." width="1000px" height="100%">

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="/php/product/detail/<?= $row['id'] ?>">
                                            <?= $row['name'] ?>
                                        </a>
                                    </h5>
                                    <b>
                                    <p class="card-text">Giá: <?= number_format($row['price'], 0, ',', '.') ?> đ</p>
                                    </b>
                                    <div class="main-click">
                                        <a href="/php/product/detail/<?= $row['id'] ?>"
                                            class="btn btn-primary">Mua Ngay</a>
                                        
                                        <button class="btn btn-primary add-to-cart add-to-cart-btn"
                                            onclick="addToCart(<?= $row['id']; ?>)">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

        <!-- Hiển thị liên kết phân trang -->
        <div class="pagination justify-content-center ptrang">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/php?page=<?= $i ?>" class="btn btn-primary btn-lg <?= ($page == $i) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>

    <script>
        function addToCart(productId) {
            // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/php/shoppingcart/addToCart/' + productId, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Đã thêm sản phẩm vào giỏ hàng thành công
                    alert('Sản phẩm đã được thêm vào giỏ hàng!');
                } else {
                    // Xử lý lỗi
                    alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>

<?php
include_once 'app/views/share/footer.php'
?>