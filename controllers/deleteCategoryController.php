<?php
    include('../lib/database.php');
    if(isset($_GET["id"])){

        $ID = $conn->real_escape_string($_GET["id"]);
        $query = 'DELETE FROM Categories where Category_id = '.$ID.';';
        if($conn->query($query)){
            header("Location: ../views/Categories.php");
        }else{
            echo "Помилка видалення <br>". $conn->error;
        }
        $conn->close();
    }else{
        header("Location: ../views/Categories.php");
    }
?>