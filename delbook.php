<?php
include('dbconfig.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM books WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
echo "<html><a href='books.php'>Список книг</a></html>";
?>