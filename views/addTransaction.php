<?php 

include("../lib/database.php");
$sql = new SQLserver();
session_start();
?>
<!--

<th>Категорія</th>
                    <th>Тип операції</th>
                    <th>Сума</th>
                    <th>Дата</th>
                    <th>Опис</th>
-->
<?php include("header.php")?>
    <main>
        <h1>Додати нову категорію</h1>
        <div class="tableContainer">
            <form class="editForm"action="../controllers/insertCategoryController.php">
                <label>Категорія</label>
                <input type="text" name="Name" placeholder="Введіть категорію" required/><br>
                <label>Тип операції</label>
                <input type="text" name="Description" placeholder="Введіть тип операції" required><br>
                <label>Дата</label>
                <input type="date" name="Description" placeholder="Оберіть дату" required><br>
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