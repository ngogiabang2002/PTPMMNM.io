
<?php
include_once 'app/views/share/header.php'

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
    
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="product-card">
                    <div class="card">
                        <img src="/php/<?= $product['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/php/product/detail/<?= $product['id'] ?>">
                                    <?= $product['name'] ?>
                                </a>
                            </h5>
                            <b>
                            <p class="card-text">Giá: <?= number_format($product['price'], 0, ',', '.') ?> đ</p>
                            </b>
                            <div class="main-click">
                                <a href="/php/product/detail/<?= $product['id'] ?>" class="btn btn-primary">Mua Ngay</a>
                                <?php
                                if (SessionHelper::isLoggedIn()) {
                                    if ($_SESSION['role'] == 1) {
                                        echo '<a href="/php/product/delete/' . $product['id'] . '" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc muốn xóa sản phẩm này?\')">Xóa</a>';
                                    }
                                }
                                ?>
                                <button class="btn btn-primary add-to-cart add-to-cart-btn"
                                    onclick="addToCart(<?= $product['id']; ?>)">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
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

