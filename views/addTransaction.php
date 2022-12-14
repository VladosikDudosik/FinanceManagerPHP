<?php 

include("../lib/database.php");
$sql = new SQLserver();
session_start();
?>
<?php include("header.php")?>
    <main>
        <h1>Додати нову категорію</h1>
        <div class="tableContainer">
            <form class="editForm"action="../controllers/insertCategoryController.php">
                <label>Назва категорії</label>
                <input type="text" name="Name" placeholder="Введіть назву" required/><br>
                <label>Опис категорії</label>
                <input type="text" name="Description" placeholder="Введіть опис" required><br>
                <input type="submit" name="" class="editSubmitButton" value="Додати">
            </form>
        <?php 
            if(isset($_SESSION['addError'])){
                echo "<p style='color:red;font-weight:bold;'>Помилка додавання</p>";
                unset($_SESSION['addError']);
            }
        ?>
        </div>
        
    </main>
<?php include("footer.php")?>