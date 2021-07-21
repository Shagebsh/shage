<?php
$connection = mysqli_connect('localhost', 'root', '', 'shageshop');

if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
  }else{
    header('location: categories.php');
  }

  if(isset($_POST) & !empty($_POST)){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $name = mysqli_real_escape_string($connection, $_POST['categoryname']);
    $sql = "UPDATE category SET name = '$name' WHERE id=$id";
    $res = mysqli_query($connection, $sql);
    if($res){
      $smsg = "Category Updated";
    }else{
      $fmsg = "Failed Update Category";
    }
  }





  ?>