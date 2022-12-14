<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <header>
        <?php include("views/navbar.php")?>
    </header>
    <main>
        <?php include($childView)?>
    </main>
    <footer></footer>
</body>
</html>