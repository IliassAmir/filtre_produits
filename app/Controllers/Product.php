
<?php
//namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Validation\Validation;

class Product extends BaseController
{
    protected ProductModel $productModel;
    private Validation $validation;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->validation   = \Config\Services::validation();
    }

    public function index()
    {
        $request = service('request');

        // Récupération des filtres depuis l'URL
        $filters = [
            'category'  => $request->getGet('category'),
            'min_price' => $request->getGet('min_price'),
        ];

        // Validation simple
        $this->validation->setRules([
            'category'  => 'permit_empty|alpha_numeric_space|max_length[50]',
            'min_price' => 'permit_empty|decimal',
        ]);

        if (!$this->validation->run($filters)) {
            return $this->render('products/product', [
                'errors'  => $this->validation->getErrors(),
                'filters' => $filters,
                'products'=> [],
            ]);
        }

        // Récupération des produits filtrés
        $products = $this->productModel->getFilteredProducts($filters);

        return $this->render('products/product', [
            'products' => $products,
            'filters'  => $filters,
        ]);
    }
}
