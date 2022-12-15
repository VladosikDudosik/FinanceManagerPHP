<?php
include('../lib/database.php');
$sql = new SQLserver();
$Transaction_date_from = $_GET['Transaction_date_from'];
$Transaction_date_to = $_GET['Transaction_date_to'];
$Type_id = $_GET['Type'];
$tableBody = $sql->HTMLGenerateReport($Transaction_date_from,$Transaction_date_to,$Type_id);
?>
<?php include("header.php")?>
    <main>
        <h1>Звіт за період: <?= $Transaction_date_from.' - ' . $Transaction_date_to?> </h1>
        <h2 style='margin-bottom:10px;'><?= $Type = $Type_id==1?'Дохід':'Витрата'; ?></h2>
        <div class="tableContainer report">
            <table id = 'reportTable'>
                <thead>
                    <th>Категорія</th>
                    <th>Сума</th>
                </thead>
                <tbody>
                    <?= $tableBody ?>
                </tbody>
            </table>
            <div id="donut_single" style="width: 900px; height: 500px;" style="background-color:none;"></div>
        </div>
        
    </main>
<?php include("footer.php")?>

 