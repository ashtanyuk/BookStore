<?php
include 'dbconfig.php';

$categories = array();
if ($result = $db->query('SELECT * FROM categories')) {
    while($tmp = $result->fetch_assoc()) {
        $categories[] = $tmp;
    }
    $result->close();
}
?>
<html>
<head>
	<title>Работа с категориями</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<H1>Категории книг</H1>

<table border="1">
	<tr><th>ID</th><th>Название</th><th>Редактировать</th><th>Удалить</th></tr>
<?php
foreach($categories AS $category) {
   $id = $category['id'];
   $title = $category['title'];
   echo "<tr><td>$id</td><td>$title</td>";
   echo "<td><a href=\"editcat.php?id=$id&title=$title\">Редактировать</a></td>";
   echo "<td><a href=\"delcat.php?id=$id\">Удалить</a></td>";
   echo "</tr>\n";
}
?>
</table>
</br></br><a href='addcat.php'>Добавить категорию</a>
</body>
</html>