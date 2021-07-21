<?php
require('database/dbclass.php');
$db = new dbClass();

$products = $db->getallproducts();
?>
<?php

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['id'], $_POST['price']) && is_numeric($_POST['id']) && is_numeric($_POST['price'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['id'];
    $quantity = (int)$_POST['price'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $this->connection->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: product.php?page=cart');
    exit;
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'price') !== false && is_numeric($v)) {
            $id = str_replace('price-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Icon -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./styles.css" />
  <title>SHAGESHOP </title>
</head>
<!-- Header -->
<header>
    <!-- Navigation -->
    <nav class="nav">
      <div class="wrapper container">
        <div class="logo"><a href="">SHAGE SHOP</a></div>
        <ul class="nav-list">
          <div class="top">
            <label for="" class="btn close-btn"
              ><i class="fas fa-times"></i
            ></label>
          </div>
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Products</a></li>
          <li>
            <a href="" class="desktop-item"
              >Page <span><i class="fas fa-chevron-down"></i></span
            ></a>
            <input type="checkbox" id="showdrop2" />
            <label for="showdrop2" class="mobile-item"
              >Page <span><i class="fas fa-chevron-down"></i></span
            ></label>
            <ul class="drop-menu2">
              <li><a href="aboutus.html">About</a></li>
              <li><a href="aboutus.html">Contact</a></li>
  
            </ul>
          </li>
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
<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="product.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>price</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="product.php?page=cart&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="product.php?page=cart&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="product.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="price">
                        <input type="number" name="price-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['price']?>" placeholder="price" required>
                    </td>
                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
</main>


  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">

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

  <!-- Custom Scripts -->
  <script src="./js/products.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>

