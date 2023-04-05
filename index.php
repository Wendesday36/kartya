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
    <link rel="stylesheet" href="style.css">
    <title>Magyar kártya</title>
</head>

<body>
    <main>
        <?php
        $adatbazis = new Ab();
        //egyéb metódusok hívása
        //$adatbazis->adatLeker("kép", "szín");
        /*  $adatbazis->adatLekerTablazatba("nev", "kep", "szin"); */
        //$phpTomb = $adatbazis->adatLeker("kép","szín");
        //$adatbazis -> megjelenites($phpTomb);
        $adatbazis->torol("kártya");
        $adatbazis->kartyaFeltolt("kártya");
        $adatbazis->kapcsolatBezar();
        ?>
    </main>
</body>

</html>