<?php
    include_once'./Ab.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar Kártya</title>
</head>
<body>
    <?php
        $adatbazis = new Ab();
        $adatbazis->adatLeker2("nev","kép","szin");
        $adatbazis->kapcsolatBezar();



    ?>
</body>
</html>