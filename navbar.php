<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "camerastore_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to sum the total quantity of products in the cart
$sql = "SELECT SUM(quantity) as total_quantity FROM cart";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
  // Fetch the result as an associative array
  $row = $result->fetch_assoc();
  $totalQuantity = $row['total_quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="icon" href="img/ProCam.png" type="image/x-icon">
</head>

<body>
  <!-- navbar -->
  <div id="navBar">
    <div class="container ">
      <div class="logo">
        <a href="Home.php">
          <img src="./img/ProCam.png" alt="" />
        </a>
      </div>
      <div class="blockNav1 hideOnMobile">
        <div class="dropdown">
          <a href="Home.php">
            <button class="subBtn">
              Trang chủ
            </button>
          </a>
        </div>
        <div class="dropdown">
          <a href="category.php"><button class="subBtn">Sản phẩm</button></a>
          <div class="dropdown-content">
            <a href="#">Canon</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Nikon</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Fujifilm</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Sony</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Panasonic</a>
            <div class="sub-dropdown">
            </div>
          </div>
        </div>
        <div class="dropdown">
          <a href="category.php"><button class="subBtn">Phụ kiện</button></a>
          <div class="dropdown-content">

            <a href="#">Ống Kính</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Bộ Lọc (Filter)</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Phụ Kiện Ánh Sáng</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Bộ Giá Đỡ và Chân Máy</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Lưu Trữ</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Khác</a>
            <div class="sub-dropdown">

            </div>
          </div>
        </div>
        <div class="dropdown">
          <a href="repair.php"><button class="subBtn">Sửa chữa</button></a>
        </div>
        <div class="dropdown">
          <a href="event.php">
            <button class="subBtn">Khuyến mãi</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="contact.php"><button class="subBtn">Liên hệ</button></a>
        </div>
        <div class="dropdown">
          <button class="subBtn">Bảo hành</button>
        </div>
      </div>
      <button onclick=showSidebar() class="showOnMobile hideOnNavbar ml-mobile"><img class='menuImg' src='./img/menu.png'></button>
      <div class="blockNav2 hideOnMobile widthOnMobile">
        <div class="search_box hideOn">
          <div class="row-search-box">
            <input type="text" id="input-box" name="input-box" autocomplete="off" placeholder="Tìm kiếm" />
            <button>
              <img src="img/SearchIcon.png" />
            </button>
          </div>
          <div class="result-box"></div>
        </div>

        <div class="login-icon" class='hideOnMobile'>
          <a href="login.php">
            <img class='hideOnMobile' width=30px src="img/signin-icon.png" alt="" />
          </a>
        </div>

        <div id="totalCart" class='hideOnMobile'>
          <p class='hideOnMobile' id="count"><?php echo $totalQuantity; ?></p>
          <a href="cart_detail.php">
            <img class='hideOnMobile' src="./img/carticon.png" alt="" />
          </a>
        </div>
      </div>
    </div>

    <div class="sideBar hideOnNavbar">
      <div class="logo">
        <a href="Home.php">
          <img src="./img/ProCam.png" alt="" />
        </a>
        <button onclick=hideSidebar() class="closeBtn showOnMobile"><img class='menuImg' src='./img/close.png'></button>
      </div>
      <div class="blockNav1 hideOnMobile">

        <div class="dropdown">
          <a href="Home.php">
            <button class="subBtn">
              Trang chủ
            </button>
          </a>
        </div>
        <div class="dropdown">
          <a href="category.php">
            <button class="subBtn">Sản phẩm</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="category.php">
            <button class="subBtn">Phụ kiện</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="repair.php">
            <button class="subBtn">Sửa chữa</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="event.php">
            <button class="subBtn">Khuyến mãi</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="contact.php">
            <button class="subBtn">Liên hệ</button>
          </a>
        </div>
        <div class="dropdown">
          <button class="subBtn">Bảo hành</button>
        </div>
      </div>
    </div>
  </div>
  <script src="js/danhmuc.js" type="text/javascript"></script>
</body>

</html>