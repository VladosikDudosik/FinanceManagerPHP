<?php
    include("../lib/database.php");
    $query = "";
    session_start();
    try{
        if(isset($_GET["Name"]) && isset($_GET["Description"])){
            $name = $conn->real_escape_string($_GET["Name"]);
            $description = $conn->real_escape_string($_GET["Description"]);
            $query = "INSERT INTO Categories (Name,Description) VALUES('".$name. "','".$description."');";
            if($conn->query($query)){
                header("Location: ../views/Categories.php");
            }else{
                echo "Помилка добавлення <br>". $conn->error;
            }
            $conn->close();
        }else{
            $_SESSION['addError'] = true;
            echo 'Помилка';
        }
    }catch(Exception $e){
        $_SESSION['addError'] = true;
    echo $query;
        //header("Location: ../views/addCategory.php");
    }
    
?>