<?php   
 $connection = mysqli_connect('localhost', 'root', '', 'shageshop');
  $sql = "SELECT * FROM category";
  $res = mysqli_query($connection, $sql); 
  while ($r = mysqli_fetch_assoc($res)) {
?>
  <tr>
    <th scope="row"><?php echo $r['id']; ?></th>
    <td><?php echo $r['name']; ?></td>
    <td><a href="editcategory.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delcategory.php?id=<?php echo $r['id']; ?>">Delete</a></td>
  </tr>
<?php } ?>