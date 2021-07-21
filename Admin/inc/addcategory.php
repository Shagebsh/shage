<?php

if(isset($_POST) & !empty($_POST)){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    $res = mysqli_query($connection, $sql);
    if($res){
      $smsg = "Category Added";
    }else{
      $fmsg = "Failed Add Category";
    }
  }



  ?>