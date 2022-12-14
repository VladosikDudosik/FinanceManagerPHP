<?php 
include('../lib/database.php');
$Transaction_id = $_GET['Transaction_id'];
$Category_id = $_GET['Category_id'];
$Type_id = $_GET['Type_id'];
$Amount = $_GET['Amount'];
$Transaction_date = $_GET['Transaction_date'];
$Description = $_GET['Description'];
$query = "UPDATE Transactions SET Category_id = $Category_id,Type_id = $Type_id, Amount = $Amount , Transaction_date = '$Transaction_date', Description ='$Description' where Transaction_id = $Transaction_id";
if($conn->query($query)){
    header("Location: ../views/Transactions.php");
}else{
    echo "Помилка редагування <br>". $conn->error;
}

?>