<?php
include("dbconfig.php");
$status = "";

if(isset($_POST['new']) && $_POST['new']==1){
    $title =$_POST['title'];
    $ins_query="INSERT INTO categories (`title`) values ('$title')";
    mysqli_query($db,$ins_query) or die(mysql_error());
    $status = "</br></br><a href='categories.php'>Категории</a>";
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
<h1>Добавить новую категорию</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="title" placeholder="Введите название" required /></p>
<p><input name="submit" type="submit" value="Добавить" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</body>
</html>