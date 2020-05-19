<html>
<head>
	<title>Регистрация</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php

include 'dbconfig.php';

if (isset($_POST['username']))
{
 $username = stripslashes($_POST['username']);
 $password = stripslashes($_POST['password']);

 $query = "INSERT INTO `users` (login, password, admin) VALUES ('$username', '". md5($password) ."', 0)";
 $result = mysqli_query($db,$query);
 if($result)
    echo "<h3>Вы успешно зарегистрированы.</h3><br/><a href='login.php'>Вход</a>";        
}
else
    {
 ?>
<h1>Регистрация</h1>
<form name="registration" action="" method="post">
<p><input type="text" name="username" placeholder="Username" required />
<p><input type="password" name="password" placeholder="Password" required />
<p><input type="submit" name="submit" value="Зарегистрировать" />
</form>
<?php } ?>
</body>
</html>