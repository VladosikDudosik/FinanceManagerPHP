<?php 
if(!isset($_GET['Name'])){
    header("Location: ../views/Home.php");
}
include("../lib/database.php");
$sql = new SQLserver();
$tableBody = $sql->HTMLTableCategory();
$Types_options = $sql->HTMLTypesOptions();
$Categories_options = $sql->HTMLCategoryOptions();
session_start();
?>
<?php include("header.php")?>
    <main>
        <h1>Редагувати транзакцію</h1>
        <div class="tableContainer">
            <form class="editForm" action="../controllers/updateTransactionController.php">
            <label>Категорія</label>
                <select name="Category_id" value="<?= $_GET['Category_id'] ?>"><?= $Categories_options; ?> </select><br>
                <label>Тип операції</label>
                <select name="Type_id" value="<?= $_GET['Type'] ?>"><?= $Types_options; ?> </select><br>
                <label>Сума</label>
                <input type="text" value="<?= $_GET['Amount'] ?>" name="Amount" placeholder="Введіть суму" required><br>
                <label>Дата</label>
                <input type="date" name="Transaction_date" value="<?= $_GET['Transaction_date'] ?>" placeholder="Оберіть дату" required><br>
                <label>Опис</label>
                <input type="text" name="Description" value="<?= $_GET['Description'] ?>" placeholder="Введіть опис" required><br>
                <input type="hidden" name="Transaction_id" value="<?= $_GET['Transaction_id'] ?>">
                <input type="submit" name="" class="editSubmitButton" value="Редагувати">
            </form>
        <?php 
            if(isset($_SESSION['addError'])){
                echo "<p style='color:red;font-weight:bold;'>Помилка редагування</p>";
                unset($_SESSION['addError']);
            }
        ?>
        </div>
        
    </main>
<?php include("footer.php")?>