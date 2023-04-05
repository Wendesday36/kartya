<?php
class Ab {
    //adattagok
    private $host = "localhost";
    private $felhasznaloNev = "root";
    private $jelszo = "";
    private $abNev = "magyar_kártya";
    private $kapcsolat;
    //konstruktor
    function __construct(){
        $this->kapcsolat = new mysqli(
            $this->host, 
            $this->felhasznaloNev,
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
        return $this->kapcsolat->query($sql);
        
    }
    function megjelenites($phpTomb){
        while ($sor = $phpTomb->fetch_row()){
            echo "<img src = \"forras/$sor[0]\" alt=\"kártya képe\">";
            echo "<br>";
        }
    }
    function rekordSzam($tabla){
        $sql = "SELECT * FROM $tabla";
        return $this->kapcsolat->query($sql)->num_rows;
    }
    function tombKeszit($phpTomb){
        $tomb = array();
        while ($sor= $phpTomb->fetch_row()) {
            $tomb[] = $sor[0];
        }
        return $tomb;
    }
    function kartyaRajz(){
        $szinTomb =$this->adatLeker("kép","szín");
        $formaTomb =$this->adatLeker("szöveg","forma");

        $szinT = $this->tombKeszit($szinTomb);
        $formaT = $this-> tombKeszit($formaTomb);
        /* echo "$szinT[0]<br>";
        echo "$formaT[0]"; */
    }
    function kartyaFeltolt($tabla){
        //a meretet hatekonysagi okokbol noveltuk
        $countSzin = $this->rekordSzam("szín")+1;
        $countForma = $this->rekordSzam("forma")+1;
        for ($i=1; $i < $countSzin; $i++) { 
            for ($j=1; $j < $countForma; $j++) { 
                $sql= "INSERT INTO $tabla (`kártyaAzon`, `színAzon`, `formaAzon`) VALUES (NULL, '$i', '$j')";
                $this->kapcsolat->query($sql);
            }
        }
    }

    function torol($tabla){
        $sql ="TRUNCATE table $tabla";
        $torles = $this->kapcsolat->query($sql);
       return $torles;
    }


    function kapcsolatBezar(){
        $this->kapcsolat->close();
    }
    
}
