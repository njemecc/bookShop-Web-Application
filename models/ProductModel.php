<?php

namespace app\models;

use app\core\DbModel;

class ProductModel extends DbModel
{
    public $id;
    public $name;
    public $image_url;
    public $description;
    public $category_id;
    public $categories;
    public $price;

    public function rules(): array
    {
       return [
           "name" => [self::RULE_REQUIRED],
           "image_url" => [self::RULE_REQUIRED],
           "price" => [self::RULE_REQUIRED]
       ];
    }

    public function tableName()
    {
        return "products";
    }

    public function attributes(): array
    {
        return [
            "name",
            "description",
            "image_url",
            "price",
            'category_id'
        ];
    }
}