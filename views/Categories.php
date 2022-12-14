<?php 

include("../lib/database.php");
$sql = new SQLserver();
$tableBody = $sql->HTMLTableCategory();
?>
<?php include("header.php")?>
    <main>
        <h1>Категорії</h1>
        <div class="tableContainer">
            <table>
                <thead>
                    <th>Назва</th>
                    <th>Опис</th>
                    <th>Управління</th>
                </thead>
                <tbody>
                    <?= $tableBody ?>
                </tbody>
            </table>
        <input type="button" onclick="location.href='addCategory.php'" name="" class="editButton" value="Додати категорію">
        </div>
        
    </main>
<?php include("footer.php")?>