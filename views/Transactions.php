<?php 

    include("../lib/database.php");
    $sql = new SQLserver();
    $tableBody = $sql->HTMLTableTransactions();
?>
<?php include("header.php")?>
    <main>
        <h1>Транзакції</h1>
        <div class="tableContainer">
            <table>
                <thead>
                    <th>Категорія</th>
                    <th>Тип операції</th>
                    <th>Сума</th>
                    <th>Дата</th>
                    <th>Опис</th>
                </thead>
                <tbody>
                    <?= $tableBody ?>
                </tbody>
            </table>
        <input type="button" onclick="location.href='addTransaction.php'" name="" class="editButton" value="Додати транзацію">
        </div>
        
    </main>
<?php include("footer.php")?>