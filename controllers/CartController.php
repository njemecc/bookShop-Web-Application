<?php

namespace app\controllers;

use app\core\Controller;

class CartController  extends Controller
{
    public function index()
    {
        $this->view("cart", "empty", null);
    }

    public function ajax()
    {
        $this->view("ajax", "empty", null);
    }

    
    public function getBooks(){


        $mysql =  new mysqli("localhost", "root", "", "wbis") or die();
        $dbResult =  $mysql -> query("select * from products;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);


    }




    public function authorize()
    {
        return ['registered','firma'];
    }
}