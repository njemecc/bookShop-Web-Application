<?php 


$json = file_get_contents("php://input");

$data = json_decode($json,true);

var_dump($data);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wbis";

// krairanje konekcije
$conn = new mysqli($servername, $username, $password, $dbname);
// provera konekcije
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$brojData = count($data);


for($x=0;  $x < $brojData ; $x++){

    
  $ukupna_cena = $data[$x]["ukupnaCena"];  
  $broj_stavki = $data[$x]["brojStavki"];  
  $itemi_korpe = $data[$x]["itemiKorpe"];  
  $datum_kreiranja_racuna = date('Y-m-d');
  //$data[$x]["datumKreiranjaRacuna"];

  echo $ukupna_cena;
  echo $broj_stavki;
  echo $itemi_korpe;
  echo $datum_kreiranja_racuna;
    


    $sql = "INSERT INTO racuni (ukupna_cena, broj_stavki,itemi,vreme_kreiranja_racuna)
    VALUES ('$ukupna_cena', '$broj_stavki', '$itemi_korpe','$datum_kreiranja_racuna')";
    

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



}

   




$conn->close();



?>