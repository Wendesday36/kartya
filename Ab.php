<?php
class Ab {
    //adattagok
    private $host = "localhost";
    private $felhasznaloNev = "root";
    private $jelszo = "";
    private $abNev = "magyarkartya";
    private $kapcsolat;
    //konstruktor
    function __construct(){
        $this->kapcsolat = new mysqli(
            $this->host, $this->felhasznaloNev,
            $this->jelszo,
            $this->abNev);
        if ($this->kapcsolat->connect_error){
            $szoveg = "<p>Sikertelen kapcsolódás!</p>";
        }
        else {
            $szoveg = "<p>Sikeres kapcsolódás!</p>";
        }
        //echo $szoveg;
        $this->kapcsolat->query("SET NAMES UTF8");
        $this->kapcsolat->query("set character set UTF8");
    }
    //metódusok
    function adatLeker($oszlop, $tabla){
        $sql = "SELECT $oszlop FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while ($sor = $phpTomb->fetch_row()){
            echo "<img src = \"forras/$sor[0]\" alt=\"kártya képe\">";
            echo "<br>";
        }
    }

    function adatLekerTablazatba($oszlop1, $oszlop2,$tabla){
        echo "<table>";
        echo"<tr><th>név</th><th>kép</th></tr>";
        $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while ($sor = $phpTomb->fetch_assoc()){
            
           
            echo "<tr><td>$sor[$oszlop1]</td>";
            echo "<td><img src = \"forras/$sor[$oszlop2]\" alt=\"kártya képe\"></td></tr>";
           /*  echo "<br>"; */
           
        }
        echo"</table>";
    }
    function kapcsolatBezar(){
        $this->kapcsolat->close();
    }
    
}
?>