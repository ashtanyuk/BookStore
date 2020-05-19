<?php
include 'dbconfig.php';

$books = array();
if ($result = $db->query('SELECT * FROM books')) {
    while($tmp = $result->fetch_assoc()) {
        $books[] = $tmp;
    }
    $result->close();
}

?>
<html>
<head>
	<title>Работа с книгами</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<H1>Список книг</H1>

<table border="1">
	<tr><th>ID</th><th>Название</th><th>Автор</th><th>Цена</th><th>Категория</th><th>Обложка</th><th>Редактировать</th><th>Удалить</th></tr>
<?php
foreach($books AS $book) {
   $id = $book['id'];
   $title = $book['title'];
   $author = $book['author'];
   $price = $book['price'];
   $category = $book['category'];
   $cover = $book['cover'];
   $imageURL = 'images/'.$cover;

   $categories = array();
   if ($result = $db->query("SELECT * FROM categories WHERE id='$category'")) {
    $categories=$result->fetch_array();
    $result->close();
    $cat_title=$categories['title'];
   }

   echo "<tr><td>$id</td><td>$title</td><td>$author</td><td>$price</td><td>$cat_title</td>";
   echo "<td><img style=\"display:block;\" width=50% src=\"$imageURL\" alt=\"\" /><br>";
   echo "<a href=\"uploadcover.php?id=$id\">Загрузить</a></td>";
   echo "<td><a href=\"editbook.php?id=$id\">Редактировать</a></td>";
   echo "<td><a href=\"delbook.php?id=$id\">Удалить</a></td>";
   echo "</tr>\n";
}
?>
</table>
</br></br><a href='addbook.php'>Добавить книгу</a>
</body>
</html>