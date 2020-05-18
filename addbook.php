<?php
include("dbconfig.php");
$status = "";

$categories = array();
if ($result = $db->query('SELECT * FROM categories')) {
    while($tmp = $result->fetch_assoc()) {
        $categories[] = $tmp;
    }
    $result->close();
}

if(isset($_POST['new']) && $_POST['new']==1){
    $title =$_REQUEST['title'];
    $author =$_REQUEST['author'];
    $price =$_REQUEST['price'];
    $category=$_REQUEST['category'];

    $ins_query="INSERT INTO books
    (`title`,`author`,`price`,`category`) values ('$title','$author','$price','$category')";
    mysqli_query($db,$ins_query) or die(mysql_error());
    $status = "</br></br><a href='books.php'>Список книг</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Вставка новой записи</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<h1>Добавить новую книгу</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="title" placeholder="Введите название" required /></p>
<p><input type="text" name="author" placeholder="Введите автора" required /></p>
<p><input type="text" name="price" placeholder="Введите цену" required /></p>
<p><select id="category" name="category" >
	<?php 
	  foreach($categories AS $category) {
        $id = $category['id'];
        $title = $category['title'];
        echo "<option value=\"$id\">$title</option>";
    }
    ?>
</select>


<p><input name="submit" type="submit" value="Добавить" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</body>
</html>