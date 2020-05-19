<?php
session_start();
include('dbconfig.php');
$status="";
?>

<html>
<head>
<meta charset="utf-8">
<title>Витрина</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <h1>Витрина</h1>

<?
if (isset($_POST['id']) && $_POST['id']!="")
{
  $id= $_POST['id'];
  $result = mysqli_query($db, "SELECT * FROM `books` WHERE `id`='$id'");
  $row = mysqli_fetch_assoc($result);
  $title = $row['title'];
  $author = $row['author'];
  $price = $row['price'];
  $cover = $row['cover'];
  $cat_id = $row['category'];
 
  $cartArray = array(
    $id=>array(
      'id'=>$id,
      'title'=>$title,
      'author'=>$author,
      'price'=>$price,
      'quantity'=>1,
      'cover'=>$cover)
  );
 
  if(empty($_SESSION["shopping_cart"])) 
  {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Добавлено в корзину!</div>";
  }
  else
  {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($id,$array_keys)) 
    {
       $status = "<div class='box' style='color:red;'>Товар уже добавлен в корзину!</div>"; 
    } 
    else 
    {
       $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
       $status = "<div class='box'>Товар добавлен в корзину!</div>";
    }
  }
}
?>

<?php
if(!empty($_SESSION["shopping_cart"])) 
{
   $cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Корзина<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<?php

echo "<table border=0><tr>";

$result = mysqli_query($db,"SELECT * FROM `books`");
$count=0;
while($row = mysqli_fetch_assoc($result))
{
    $count++;
    echo "<td><div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='id' value=".$row['id']." />
    <div class='image'><img width=50% src='".'images/'.$row['cover']."' /></div>
    <div class='title'>".$row['title']."</div>
    <div class='price'>".$row['price']. " р."."</div>
    <button type='submit' class='buy'>Купить</button>
    </form>
    </div></td>";
    if($count % 4==0)
        echo "</tr><tr>";
}
echo "</tr>";
mysqli_close($db);
?>
 
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;"><?php echo $status; ?></div>
<p><a href="index.php">На главную</a>

