<?php
include "./php/db.php";
include "navbar.php";
include("./php/products.php");


$sql = "SELECT * FROM products WHERE discount = 1";
$result = $conn->query($sql);
?>

<style>
    h1 {
        margin-top: 10%;
        display: inline-block;
        text-align: center;
        font-size: 20px;
        width: 100%;
    }
</style>

<div id="slider"></div>
<h1>Khuyến Mãi Máy Ảnh</h1>
<div class="content discountProductcss" id="content">
    <div class="discountProduct product-group" id="discountProduct">
        <?php
        // Check if there are any products with a discount
        if ($result->num_rows > 0) {
            // Output data of each product
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $images = json_decode($row['images'], true); // Decode images for the current product
                $primaryImage = !empty($images) ? $images[0] : 'default-image.png'; // Use the first image or a default
                $title = htmlspecialchars($row['title'], ENT_QUOTES);
                $price = htmlspecialchars($row['price'], ENT_QUOTES);
                $formattedPrice = number_format($price, 0, ',', '.'); // Format price to VND
                echo "<div id='product' class=''>
                    <a href='product.html' class='productLink'>
                        <img class='productImg' src='$primaryImage' alt='$title'>
                    </a>
                    <label class='productName'>$title</label>
                    <p class='productPrice'>Giá từ <strong>$formattedPrice</strong></p>
                    <p>Khuyến mãi: Giảm 10%</p>
                    <button class='addCart' onclick='displayBuyBox($id)'>
                        <img src='img/carticon.png' alt='cartIcon'>
                        <p class='muahang'>Mua hàng</p>
                    </button>
                </div>";
            }
        } else {
            echo '<p>No products available.</p>'; // Message if no products found
        }
        ?>
    </div>

    <div id="buyBox">
        <?php foreach ($products as $product): ?>
            <form method="POST" action="./php/products.php">
                <?php $image = json_decode($product['images'])[0]; ?>
                <div class="notiBox-<?php echo $product['id']; ?>" id="notiBox" style="display: none;">
                    <div class="backgroundNoti"></div>
                    <div class="littleBox">
                        <button class="exitBtn" id="exitBtn" type="button" onclick="this.parentElement.parentElement.style.display='none'">X</button>
                        <div class="firstInfo">
                            <div class="imgAndInfo">
                                <img src="<?php echo $image; ?>" alt="" class="imgInLittleBox">
                                <div class="productInfo">
                                    <h2><?php echo $product['title']; ?></h2>
                                    <p>
                                        <span id="priceOfProduct"></span><?php echo $formattedPrice = number_format($product['price'], 0, ',', '.'); ?>
                                        <span>VND</span>
                                    </p>
                                </div>
                            </div>
                            <div class="amountproduct">
                                <button type="button" class="addToCart" data-id="<?php echo $product['id']; ?>" data-price="<?php echo $product['price']; ?>">+</button>
                                <input name="quantity" id="userCount-<?php echo $product['id']; ?>" class="amountProduct" value="0" readonly>
                                <button type="button" class="delToCart" data-id="<?php echo $product['id']; ?>">-</button>
                                <input type="hidden" name="quantity-<?php echo $product['id']; ?>" id="inputQuantity-<?php echo $product['id']; ?>" value="0">
                            </div>
                        </div>

                        <div class="eventGift">
                            <h2><img class="giftIcon" src="img/giftbox.png" alt="">Chương trình khuyến mãi</h2>
                            <p class="eventDes">Tặng thẻ nhớ 64GB</p>
                        </div>
                        <div class="lastInfo">
                            <div class="countBox">
                                <h2 class="priceTemp">Tạm tính: <strong class='displayPrice' id="displayPrice-<?php echo $product['id']; ?>">0</strong></h2>
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="nameproduct" value="<?php echo $product['title']; ?>">
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                            <button type="submit" class="buyBtn">Xác nhận mua</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    <button class="ctrl-btn pro-prev">
        <img src="img/left-arrow.png" alt="" />
    </button>
    <button class="ctrl-btn pro-next">
        <img src="img/right-arrow.png" alt="" />
    </button>
</div>

<div id="buyBox"></div>

<div class="footer" id="footer">
</div>

<script src="js/product-slider.js" type="text/javascript"></script>
<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/discount.js"></script>
<script src="./js/product-cart.js" type="text/javascript"></script>