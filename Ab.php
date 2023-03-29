<?php
class Ab{
    //adattagok
    private $host  = "localhost";
    private $felhasznaloNev  = "root";
    private $jelszo = "";
    private $abNev = "magyarkartya";
    private $kapcsolat;

    //konstruktor
    function __construct(){
        $this->kapcsolat = new mysqli(
            $this -> host,
            $this -> felhasznaloNev,
            $this -> jelszo,
            $this -> abNev
        ); 
        if ($this ->kapcsolat->connect_error) {
            $szoveg = "<p>Sikertelen kapcsolódás!</p>";
        }else{
            $szoveg = "<p>Sikeres kapcsolódás</p>";
        };
        echo $szoveg;
        $this -> kapcsolat->query("SET NAMES UTF8");
        $this -> kapcsolat->query("SET  character set UTF8");
    
        
    }
    //metodus

    function adatLeker($oszlop,$tabla){
        $sql = "SELECT $oszlop FROM $tabla";
       $kepek =  $this->kapcsolat->query($sql);
       while ($sor = $kepek->fetch_row())
       {
        echo"<img src= \"forras/$sor[0]\" alt\"kártya képe\">";
        echo"<br>";
       }
    }
    function adatLeker2($oszlop,$oszlop2,$tabla){
       $sql = "SELECT $oszlop ,$oszlop2 FROM $tabla" ;
       $kepek =  $this->kapcsolat->query($sql);
       while ($sor = $kepek->fetch_assoc())
       {
        echo "<p> $sor[$oszlop]</p>";
        echo"<img src= \"forras/$sor[$oszlop2]\" alt\"kártya képe\">";
        echo"<br>";
       }
    }
    function kapcsolatBezar(){
        $this->kapcsolat->close();
    }





    
}


?>