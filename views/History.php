<?php
include("../lib/database.php");
$sql = new SQLserver();
$Types_options = $sql->HTMLTypesOptions();
?>
<?php include("header.php")?>
    <main>
        <h1>Генератор звітів</h1>
        <div class="tableContainer">
            <form action="generateReport.php" class="editForm">
                <label for="">Від</label>
                <input name="Transaction_date_from" type="date" name="" id="" require><br>
                <label for="">До</label>
                <input name="Transaction_date_to" type="date" name="" id="" require><br>
                <label for="">Тип операції</label>
                <select name="Type"> <?= $Types_options; ?></select><br>
                <input type="submit" value = 'Згенерувати' class='editButton'/>
            </form>
        </div>
    </main>
<?php include("footer.php")?>