<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','category','price'];

    public function getFilteredProducts(array $filters)
    {
        $builder = $this->builder();

        // Filtre par catégorie
        if (!empty($filters['category'])) {
            $builder->like('category', $filters['category']);
        }

        // Filtre par prix minimum
        if (!empty($filters['min_price'])) {
            $builder->where('price >=', (float)$filters['min_price']);
        }

        return $builder->get()->getResultArray();
    }
}
