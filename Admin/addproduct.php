<?php


if(isset($_POST) & !empty($_POST)){
    $prodname = mysqli_real_escape_string($connection, $_POST['productname']);
    $description = mysqli_real_escape_string($connection, $_POST['productdescription']);
    $category = mysqli_real_escape_string($connection, $_POST['productcategory']);
    $price = mysqli_real_escape_string($connection, $_POST['productprice']);
  
  
    if(isset($_FILES) & !empty($_FILES)){
      $name = $_FILES['productimage']['name'];
      $size = $_FILES['productimage']['size'];
      $type = $_FILES['productimage']['type'];
      $tmp_name = $_FILES['productimage']['tmp_name'];
  
      $max_size = 10000000;
      $extension = substr($name, strpos($name, '.') + 1);
  
      if(isset($name) && !empty($name)){
        if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
          $location = "uploads/";
          if(move_uploaded_file($tmp_name, $location.$name)){
            //$smsg = "Uploaded Successfully";
            $sql = "INSERT INTO products (name, price , categoryid,description, product_img) VALUES ('$prodname', '$price', '$category', '$description', '$location$name')";
            $res = mysqli_query($connection, $sql);
            if($res){
              //echo "Product Created";
              header('location: products.php');
            }else{
              $fmsg = "Failed to Create Product";
            }
          }else{
            $fmsg = "Failed to Upload File";
          }
        }else{
          $fmsg = "Only JPG files are allowed and should be less that 1MB";
        }
      }else{
        $fmsg = "Please Select a File";
      }
    }else{
  
      $sql = "INSERT INTO products (name, description, catid, price) VALUES ('$prodname', '$description', '$category', '$price')";
      $res = mysqli_query($connection, $sql);
      if($res){
        header('location: products.php');
      }else{
        $fmsg =  "Failed to Create Product";
      }
    }
  }







?>