<?php 
include "lib/database.php";
$db = new SQLserver();
$tableBody = $db->HTMLTableCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <th>#</th>
        <th>Назва</th>
        <th>Опис</th>
        <th>Управління</th>
    </thead>
    <tbody>
        <?= $tableBody ?>
    </tbody>
</table>
</body>
</html>