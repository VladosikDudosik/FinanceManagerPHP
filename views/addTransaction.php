<?php 

include("../lib/database.php");
$sql = new SQLserver();
$Categories_options = $sql->HTMLCategoryOptions();
$Types_options = $sql->HTMLTypesOptions();
session_start();
?>
<?php include("header.php")?>
    <main>
        <h1>Додати нову категорію</h1>
        <div class="tableContainer">
            <form class="editForm"action="../controllers/insertTransactionController.php">
                <label>Категорія</label>
                <select name="Category"><?= $Categories_options; ?> </select><br>
                <label>Тип операції</label>
                <select name="Type"><?= $Types_options; ?> </select><br>
                <label>Сума</label>
                <input type="text" name="Amount" placeholder="Введіть суму" required><br>
                <label>Дата</label>
                <input type="date" name="Date" placeholder="Оберіть дату" required><br>
                <label>Опис</label>
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