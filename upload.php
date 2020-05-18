<?php
include 'dbconfig.php';
$statusMsg = '';

$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $id=$_POST["bookid"];
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $update="UPDATE books SET cover='".$fileName."' where id='". $id ."'";
            $insert = $db->query($update);
            if($insert){
                $statusMsg = "Файл ".$fileName. " загружен успешно.";
            }else{
                $statusMsg = "Ошибка загрузки!";
            } 
        }else{
            $statusMsg = "Ошибка загрузки!";
        }
    }else{
        $statusMsg = 'Только файлы JPG, JPEG, PNG, GIF, & PDF-форматов должны использоваться';
    }
}else{
    $statusMsg = 'Укажите файл для загрузки!';
}

echo $statusMsg;
$status = "</br></br><a href='books.php'>Список книг</a>";
echo $status;
?>