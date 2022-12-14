<?php
    include("../lib/database.php");
    $query = "";
    session_start();
    try{
        if(isset($_GET["Category"]) && isset($_GET["Type"]) && isset($_GET['Amount']) && isset($_GET['Date']) && isset($_GET['Description'])){
            $Category = $_GET["Category"];
            $Type = $_GET["Type"] ;
            $Amount  = $_GET["Amount"];
            $Date = $_GET["Date"];
            $Description = $_GET["Description"];
            $query = "INSERT INTO Transactions (Category_id,Type_id,Amount,Transaction_Date,Description) VALUES(
                (SELECT Category_id FROM Categories WHERE Category_id = $Category ),
                (SELECT Type_id FROM Transaction_Types WHERE Type_id = $Type),
                $Amount,
                '$Date',
                '$Description'
            );";
            if($conn->query($query)){
                header("Location: ../views/Transactions.php");
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
        echo $e->getMessage();
        //header("Location: ../views/addCategory.php");
    }
    
?>