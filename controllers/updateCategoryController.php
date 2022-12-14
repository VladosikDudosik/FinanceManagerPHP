<?php 
include('../lib/database.php');
$id = $_GET['id'];
$Name = $_GET['Name'];
$Description = $_GET['Description'];
$query = "UPDATE Categories SET  Name = '$Name', Description ='$Description' where Category_id = $id";

if($conn->query($query)){
    header("Location: ../views/Categories.php");
}else{
    echo "Помилка редагування <br>". $conn->error;
}

?>