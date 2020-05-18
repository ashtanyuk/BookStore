<html>
<head>
	<title>Загрузка обложки</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<H1>Загрузить обложку</H1>

<?php $id =$_REQUEST['id']; ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Выберите изображение для загрузки для книги с id=<?php echo $id; ?>
    <p><input type="file" name="file">
    <p><input type="hidden" name="bookid" value="<?php echo $id; ?>" />
    <p><input type="submit" name="submit" value="Загрузить">
</form>

</body>
</html>