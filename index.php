<?php
include("auth.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Добро пожаловать в наш магазин!</title>
<link rel="stylesheet" href="css/login.css" />
</head>
<body>
<h1>Здравствуйте <?php echo $_SESSION['username']; ?>!</h1>
<p><a href="books.php">Список книг</a></p>
<p><a href="categories.php">Список категорий</a></p>
<p><a href="main.php">Витрина</a></p>
<a href="logout.php">Выйти</a>
</div>
</body>
</html>