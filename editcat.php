<html>
<head>
	<title>Работа с категориями</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Редактировать категорию</h1>

<?php
include 'dbconfig.php';

$status = "";
$id=$_REQUEST['id'];
$title =$_REQUEST['title'];

if(isset($_POST['new']) && $_POST['new']==1)
{
   $id=$_POST['id'];
   $title =$_POST['title'];

   $update="UPDATE categories SET title='".$title."' where id='". $id ."'";

   mysqli_query($db, $update) or die(mysqli_error());
   $status = "Обновлено успешно. </br></br><a href='categories.php'>Список категорий</a>";
   echo '<p style="color:#FF0000;">'.$status.'</p>';
}
else
{
?>
	<form name="form" method="post" action=""> 
    <input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $id;?>" />
    <p><input type="text" name="title" placeholder="Название:" required value="<?php echo $title;?>" /></p>
    <p><input name="submit" type="submit" value="Обновить" /></p>
</form>
<?php
}
?>

</body>
</html> 