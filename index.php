<?php
require('database/dbclass.php');
$db = new dbClass();
$products = $db->getallproducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./styles.css" />
  <title>SHAGESHOP</title>
</head>
<body>
  <!-- Header -->
  <header>
  <nav class="nav"><!-- Navigation -->
    <div class="wrapper container">
      <div class="logo"><a href="">SHAGE SHOP</a></div>
      <ul class="nav-list"><!-- option list  -->
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Products</a></li>    
        <li><a href="./user/login.php">long in</a></li>
        <li> <!-- drop down box  -->
          <a href="" class="desktop-item">Contact us <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop2" />
          <label for="showdrop2" class="mobile-item">Contact us <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu2">
            <li><a href="aboutus.html">About</a></li>
            <li><a href="aboutus.html">Contact</a></li>          
        
          </ul>
        </li> 
        <li><a href="cart.html">Cart</a></li>
        <!-- icons -->
        <li class="icons">
          <span>
            <img src="./images/shoppingBag.svg" alt="" />
            <small class="count d-flex">0</small>
          </span>
          <span><img src="./images/search.svg" alt="" /></span>
        </li>
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
</header>
<!-- Main -->
<main>
  <div class="hero">
    <div class="left"><!-- wellcoming section -->
      <span>Exclusive Sales</span>
      <h1>UP TO 50% OFF ON SALES</h1>
      <small>Get all exclusive offers for the season</small>
      <a href="">View Collection </a>
    </div>
  </div>

  <!-- Promotion -->
  <!-- Shop Collections -->
  <section class="section promotion">
    <div class="title">
      <h2>Shop Collections</h2>
      <span>Select from the premium product and save plenty money</span>
    </div>
   
      <section class="section advert">
        <div class="advert-layout container">
         <!-- Collection 1 -->
          <div class="item">
            <img src="./images/shirt.jpg" alt="">
            <div class="content  right">
              <span>New Trending</span>
              <h3 >SHIRT</h3>
              <a href="product.php">Shop Now </a>
            </div>
          </div>
          <!--  Collection 2 -->
          <div class="item">
            <img src="./images/tshirt.jpg" alt="">
            <div class="content  right">
              <span>New Trending</span>
              <h3>T-SHIRT'S</h3>
              <a href="product.php">Shop Now </a>
            </div>
          </div>
          <!--  Collection 3 -->
          <div class="item">
            <img src="./images/jacket.jpg" alt="">
            <div class="content  right">
              <span>New Trending</span>
              <h3>JACKET'S</h3>
              <a href="product.php">Shop Now </a>
            </div>
          </div>
        </div>
      </section>
    
    </section>
  
  </section>

  <!-- Products -->
  
  <section class="section products">
    <div class="title">
      <h2>Our Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>
    <div class="product-layout">
<!-- get all the Products from the shop server -->
<?php foreach($products as $row): ?>
<div class="product">
<div class="img-container">
<img src="<?=$row['product_img']?>" alt="" /> 
  <div class="addCart">
    <i class="fas fa-shopping-cart"></i>
  </div>

  <ul class="side-icons">
    <span><i class="fas fa-search"></i></span>
    <span><i class="far fa-heart"></i></span>
    <span><i class="fas fa-sliders-h"></i></span>
  </ul>
</div>
<div class="bottom">
  <a href="productDetails.php?page=product&id=<?=$row['id']?>"><?=$row['name']?></a>
  <div class="price">
    <span>$<?=$row['price']?></span>
  </div>
</div>
</div>
<?php endforeach ?>
</div>   
</section>    
 </div>   
   
  <!-- BRANDS -->
  <!-- the brands of our Products -->
  <section class="section brands">
    <div class="title">
      <h2>Shop by Brand</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

    <div class="brand-layout container">
      <div class="glide" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <img src="./images/brand1.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand2.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand3.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand4.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand5.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand6.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand7.png" alt="">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
<!-- links to get more information -->
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="aboutus.html">About Us</a>
          <a href="aboutus.html">Privacy Policy</a>
          <a href="aboutus.html">Terms & Conditions</a>
          <a href="aboutus.html">Contact Us</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            42 Dream House,GOLAN HIGHTS, IAL
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            shageshop@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            04-926-6933
          </div>
          <div class="payment-methods">
            <img src="./img/payment.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->
  
  <!-- Glidejs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <!-- Custom Scripts -->
  <script src="./js/products.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</body>
</html>

