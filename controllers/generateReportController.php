<?php
/*SELECT C.Name,SUM(T.AMOUNT) FROM TRANSACTIONS AS T 
JOIN CATEGORIES AS C ON C.CATEGORY_ID = T.CATEGORY_ID
WHERE T.TRANSACTION_DATE BETWEEN '2022-12-1' AND '2022-12-2'
GROUP BY C.NAME*/
$Transaction_date_from = $_GET['Transaction_date_from'];
$Transaction_date_to = $_GET['Transaction_date_to'];
$Type = $_GET['Type'];
$Category = $_GET['Category'];
echo 'Від '. $Transaction_date_from . ' До '. $Transaction_date_to . ' Тип '. $Type . ' Категорія '. $Category;
?>

 