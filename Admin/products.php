<?php   
  require('../database/dbclass.php');
  $db = new dbClass();
  
  $products = $db->getallproducts();
  
?>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" />
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <h1 style="color:#fff;">SHAGESHOP</h1>
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
     <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
      </li>
       <li>
       <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
      </li>
      <li class="active-link">
      <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
       </li>
        <li>
        <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
       </li>
       <li>
       <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
      </li>

    <li>
     <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
     </li>
       <li>
         <a href="#"><i class="fa fa-table "></i>My Link Four</a>
        </li>
          <li>
           <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
          </li>
         </ul>
     </div>
   </nav>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
     <div id="page-inner">
      <div class="row">
         <div class="col-md-12">
         <h2>PRODUCT PAGE </h2>   
       </div>
  </div>              
                 <!-- /. ROW  -->
<main>
<?php foreach($products as $product): ?>
  <div class="product">
    <div class="img-container"><a href="productDetails.php?id<?php echo $product['id'];?>">
    <img src="<?= $product['product_img']?>" alt="" /> 
    </div>
    <div class="bottom">
    
      <a  href=""><?=$product['name']?></a>
      <div class="price">
        <span>$<?=$product['price']?></span>
      </div>
       <td><a href="editproduct.php?id=<?php echo $product['id']; ?>">Edit</a> | <a href="delproduct.php?id=<?php echo $product['id']; ?>">Delete</a></td>
    </div>
  </div></a>
  <?php endforeach ?>
</main> 
  </div> 
</div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
       <div class="row">
            <div class="col-lg-12" >
           &copy;  <p style="color:#fff;">SHAGESHOP</p></a>
        </div>
       </div>
   </div>
          
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


<footer>








</footer>
