<?php
include 'dbconfig.php';

$id=$_REQUEST['id'];
$query = "DELETE FROM categories WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
echo "<html><a href='categories.php'>Список категорий</a></html>";
?>