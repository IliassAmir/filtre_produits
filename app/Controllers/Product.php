<?php

namespace App\controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Validation\Validation;


class Product extends BaseController
{

     protected ProductModel $productModel; 
     private Validation $validation;

     public function __construct(){
        $this->productModel = new ProductModel();
$this->validation = \Config\Services::validation();
     }
    

     public function index(){

     // hadi hia la branche dev
      // deuxieme modif f dev
       $request = service('request');

       $filters = [
        'category'=> $request ->getGet('category'),
        'min_price'=> $request ->getGet('min_price'),   
       ];


      $products = $this->productModel->getFilteredProducts($filters);

     return view('product.tpl', [
    'products' => $products,
    'filters'  => $filters,
    'errors'   => $this->validation->getErrors() ?? []
]);


}


}