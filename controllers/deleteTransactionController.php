<?php
    include('../lib/database.php');
    if(isset($_GET["id"])){

        $ID = $conn->real_escape_string($_GET["id"]);
        $query = 'DELETE FROM Transactions where Transaction_id = '.$ID.';';
        if($conn->query($query)){
            header("Location: ../views/Transactions.php");
        }else{
            echo "Помилка видалення <br>". $conn->error;
        }
        $conn->close();
    }else{
        header("Location: ../views/Transactions.php");
    }
?>