<?php 

include("lib/database.php");
$sql = new SQLserver();
?>
<?php include("header.php")?>
    <main>
        <h1>Categories</h1>
        <div class="tableContainer">
            <table>
                <thead>
                    <th>#</th>
                    <th>Назва</th>
                    <th>Опис</th>
                </thead>
                <tbody>
                    <?= $tableBody ?>
                </tbody>
            </table>
        </div>
        
    </main>
<?php include("footer.php")?>