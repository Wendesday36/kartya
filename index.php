<!-- import -->
<?php
    include_once './Ab.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar kártya</title>
</head>
<body>
    <?php
        $adatbazis = new Ab();
        //egyéb metódusok hívása
        //$adatbazis->adatLeker("kép", "szín");
        $adatbazis->adatLeker2("nev", "kep", "szin");
        $adatbazis->kapcsolatBezar();
    ?>
</body>
</html>