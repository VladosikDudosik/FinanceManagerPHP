<?php 
if(!isset($_GET['Name'])){
    header("Location: ../views/Home.php");
}
include("../lib/database.php");
$sql = new SQLserver();
$tableBody = $sql->HTMLTableCategory();
session_start();
?>
<?php include("header.php")?>
    <main>
        <h1>Редагувати категорію</h1>
        <div class="tableContainer">
            <form class="editForm" action="../controllers/updateCategoryController.php">
                <label>Назва категорії</label>
                <input value="<?= $_GET['Name'] ?>" type="text" name="Name" placeholder="Введіть назву" required/><br>
                <label>Опис категорії</label>
                <input value="<?= $_GET['Description'] ?>" type="text" name="Description" placeholder="Введіть опис" required><br>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" >
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