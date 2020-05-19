<html>
<head>
	<title>Редактирование книги</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Редактировать книгу</h1>

<?php
include 'dbconfig.php';

$status = "";
$id=$_REQUEST['id'];

$book = array();
if ($result = $db->query("SELECT * FROM books WHERE id='$id'")) {
    $book=$result->fetch_array();
    $result->close();
}

$categories = array();
if ($result = $db->query('SELECT * FROM categories')) {
    while($tmp = $result->fetch_assoc()) {
        $categories[] = $tmp;
    }
    $result->close();
}

$title=$book['title'];
$author=$book['author'];
$price=$book['price'];
$category=$book['category'];


if(isset($_POST['new']) && $_POST['new']==1)
{
   $id=$_POST['id'];
   $title=$_POST['title'];
   $author=$_POST['author'];
   $price=$_POST['price'];
   $category=$_POST['category'];
   

   $update="UPDATE books SET title='".$title."', author='".$author."', price='".$price."', category='".$category."' where id='". $id ."'";

   mysqli_query($db, $update) or die(mysqli_error());
   $status = "Обновлено успешно. </br></br><a href='books.php'>Список книг</a>";
   echo '<p style="color:#FF0000;">'.$status.'</p>';
}
else
{
?>
	<form name="form" method="post" action=""> 
    <input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $id;?>" />
    <p><input type="text" name="title" placeholder="Название:" required value="<?php echo $title;?>" /></p>
    <p><input type="text" name="author" placeholder="Автор:" required value="<?php echo $author;?>" /></p>
    <p><input type="text" name="price" placeholder="Цена:" required value="<?php echo $price;?>" /></p>
<p><select id="category" name="category" >
  <?php 
    foreach($categories AS $category) {
        $id = $category['id'];
        $title = $category['title'];
        echo "<option value=\"$id\">$title</option>";
    }
    ?>
</select>

    <p><input name="submit" type="submit" value="Обновить" /></p>
</form>
<?php
}
?>

</body>
</html> 