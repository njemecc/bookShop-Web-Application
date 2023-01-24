<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CategoryModel;
use app\models\ProductModel;
use app\core\DbModel;
use mysqli;


class ProductController extends Controller
{
    public function create()
    {
        $model = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->all();
        $model->categories = $categories;

        return $this->view("createProduct", "empty", $model);
    }

    public function createProductProcess()
    {
        $model = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->all();
        $model->categories = $categories;

        $model->mapData($this->router->request->all());
        $model->validate();

        if ($model->errors)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Kreiranje proizovda nije uspesno proslo!");

            return $this->view("createProduct", "dashboard", $model);
        }

        $model->create();
        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Uspesno kreirano!");

        return $this->view("createProduct", "dashboard", $model);
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
       return [
           "firma","registered"
       ];
    }
}