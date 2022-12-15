<?php
include('../lib/database.php');
$Transaction_date_from = $_GET['Transaction_date_from'];
$Transaction_date_to = $_GET['Transaction_date_to'];
$Type_id = $_GET['Type'];
$Type = $Type_id==1?'Дохід':'Витрата';
$query = "SELECT C.Name,SUM(T.AMOUNT) AS 'SUM' FROM TRANSACTIONS AS T 
JOIN CATEGORIES AS C ON C.CATEGORY_ID = T.CATEGORY_ID
WHERE T.TRANSACTION_DATE BETWEEN '$Transaction_date_from' AND '$Transaction_date_to'
AND T.Type_id = ".$Type_id."
GROUP BY C.NAME";
$tableBody = '';
$result = $conn->query($query);
if ($result->num_rows >0){
    while ($row = $result->fetch_assoc()){
        $tableBody .="<tr>
        <td>".$row['Name']."</td>
        <td>".$row['SUM']."</td>
    </tr>";
    }
}
?>
<?php include("header.php")?>
    <main>
        <h1>Звіт за період: <?= $Transaction_date_from.' - ' . $Transaction_date_to?> </h1>
        <h2 style='margin-bottom:10px;'><?= $Type ?></h2>
        <div class="tableContainer">
            <table>
                <thead>
                    <th>Категорія</th>
                    <th>Сума</th>
                </thead>
                <tbody>
                    <?= $tableBody ?>
                </tbody>
            </table>
        </div>
    </main>
<?php include("footer.php")?>

 