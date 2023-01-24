<?php

namespace app\controllers;

use app\core\Controller;
use mysqli;

class AdministrationController  extends Controller
{
    public function users()
    {
        $this->view("users", "dashboard", null);
    }

    public function getAllUsers()
    {
        $mysql =  new mysqli("localhost", "root", "", "wbis") or die();

        $dbResult =  $mysql -> query("select * from users;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }






public function showCharts()
{
    $this->view("chart","empty",null);
}

public function brojProdatihArtikala(){

    $mysql =  new mysqli("localhost", "root", "", "wbis") or die();

    $dbResult =  $mysql -> query("select itemi from racuni;") or die(mysqli_error($mysql)); $dbResult =  $mysql -> query("select itemi from racuni;") or die(mysqli_error($mysql));

    

    $dbResult2 = $mysql-> query("select name from products;") or die(mysqli_error($mysql));

    $imenaSvihKnjiga = [];
    $resultArray = [];
    $prodateKnjige = [];
    $praveProdateKnjige = [];


  
    
    while ($result = $dbResult->fetch_assoc()) {
        $resultArray[] = $result;
    }

    while ($result = $dbResult2->fetch_assoc()) {
        $imenaSvihKnjiga[] = $result;
    }

    
    
    

    $brojResultAreja = count($resultArray);

for($i = 0; $i<$brojResultAreja; $i++){
    array_push($prodateKnjige,$resultArray[$i]["itemi"]);
}



$myArray = [];


for($i = 0; $i<$brojResultAreja; $i++){

    $myArray[$i] = explode(',',$prodateKnjige[$i]);

   

    
    
}

foreach ($myArray as $value) {
        
    array_push($praveProdateKnjige,$value);
    
}


   



   function array_flatten($array) { 
    if (!is_array($array)) { 
      return FALSE; 
    } 
    $result = array(); 
    foreach ($array as $key => $value) { 
      if (is_array($value)) { 
        $result = array_merge($result, array_flatten($value)); 
      } 
      else { 
        $result[$key] = $value; 
      } 
    } 
    return $result; 
  } 


  $praveProdateKnjige = array_flatten($praveProdateKnjige);
  $praveProdateKnjige = array_filter($praveProdateKnjige);
  $brojZaIteraciju = count($praveProdateKnjige);

  $imeKnjigeArray = [];
  
  for($i = 0; $i < $brojZaIteraciju; $i++){
    

    $id = $praveProdateKnjige[$i]?? $praveProdateKnjige[++$i];

    
    $dbResult =  $mysql -> query("select products.name from products WHERE $id = products.id ;") or die(mysqli_error($mysql));
    $imeKnjigeArray[$i] = $dbResult->fetch_assoc();
   
    
  }


  foreach ($imeKnjigeArray as $key => $value){
    $imeKnjigeArray[$key] = $value['name'];
  }



 $objekat = [
   
 ];


//punim objekat imenima svih knjiga iz baze: 
 
  foreach($imenaSvihKnjiga as $key => $value){
    $objekat[$value["name"]] = 0;
  }




  //dodajemo +1 za svaki put kada je knjiga prodata



foreach($imeKnjigeArray as $knjiga){

    switch ($knjiga) {
        case "48 Laws of Power":
         $objekat[$knjiga] += 1;
          break;
        case "digital gold":
            $objekat[$knjiga] += 1 ;
          break;
          case "Rich Dad Poor Dad":
            $objekat[$knjiga] += 1 ;
          break;
          case "Think and Grow Rich":
            $objekat[$knjiga] += 1 ;
          break;
          case "Atomic Habits":
            $objekat[$knjiga] += 1 ;
          break;
          case "influance people":
            $objekat[$knjiga] += 1 ;
          break;
          case "The Lean Startup":
            $objekat[$knjiga] += 1 ;
          break;
          case "Zero to One":
            $objekat[$knjiga] += 1 ;
          break;
          case "kid inside you":
            $objekat[$knjiga] += 1 ;
          break;
          case "psyhology of money":
            $objekat[$knjiga] += 1 ;
          break;
          case "Demon Slayer":
            $objekat[$knjiga] += 1 ;
          break;
          case "Death Note":
            $objekat[$knjiga] += 1 ;
          break;
          case "Hobbits":
            $objekat[$knjiga] += 1 ;
          break;
          case "Lord of The Rings":
            $objekat[$knjiga] += 1 ;
          break;
          case "Sell or Give Up":
            $objekat[$knjiga] += 1 ;
          break;
          
        default:
          //code to be executed if fruit is different from all fruits;
      }
}


  

echo json_encode($objekat);


}


public function showChart2() {

  $mysql =  new mysqli("localhost", "root", "", "wbis") or die();
  $resultArray = [];
  

  $dbResult =  $mysql -> query("select itemi from racuni;") or die(mysqli_error($mysql)); $dbResult =  $mysql -> query("select itemi from racuni;") or die(mysqli_error($mysql));

  while ($result = $dbResult->fetch_assoc()) {
    $resultArray[] = $result;
}


for($i=0; $i < count($resultArray); $i++){

  $resultArray[$i] = $resultArray[$i]['itemi'];

}

for($i=0; $i < count($resultArray); $i++){

  $resultArray[$i] = explode(',',$resultArray[$i]);

}

//array flatten function
function array_flatten($array) { 
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
} 

$resultArray = array_flatten($resultArray);
$resultArray = array_filter($resultArray);




$objekat = [
  "self-Improvment" => 0,
  "psyhology" => 0,
  "fantasy" => 0,
  "thriller" => 0,
  "manga" => 0
   
];



for($i = 0; $i < count($resultArray); $i++){
    

  $id = $resultArray[$i]?? $resultArray[++$i];

  $dbResult = $mysql -> query("SELECT products.price,categories.name  FROM products
  INNER JOIN categories 
  ON products.category_id = categories.id
  WHERE products.id = $id;") ;

$rezultat = $dbResult->fetch_assoc();

$price = $rezultat["price"];
$price =  (int)$price;
$category = $rezultat["name"];
$category = (string)$category;

switch ($category) {
  case "self-Improvment":
   $objekat[$category] += $price;
    break;
  case "psyhology":
    $objekat[$category] += $price;
    break;
    case "fantasy":
      $objekat[$category] += $price;
    break;
    case "thriller":
      $objekat[$category] += $price;
    break;
    case "manga":
      $objekat[$category] += $price;
    break;

 }
 
 
  
}


 echo json_encode($objekat);

}

public function chart3(){

  $mysql =  new mysqli("localhost", "root", "", "wbis") or die();
  $resultArray = [];
  

  $dbResult =  $mysql -> query("SELECT sum(ukupna_cena),vreme_kreiranja_racuna FROM racuni GROUP BY vreme_kreiranja_racuna;") or die(mysqli_error($mysql)); 

  while ($result = $dbResult->fetch_assoc()) {
    $resultArray[] = $result;
}


echo json_encode($resultArray);

}



    public function authorize()
    {
        return ["firma"];
    }
}