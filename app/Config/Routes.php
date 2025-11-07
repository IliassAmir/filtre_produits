<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Product::index');        // Page d'accueil : liste des produits
$routes->get('products', 'Product::index'); // Liste des produits (même que page d'accueil)
$routes->get('products/export', 'Product::export'); // Export CSV
$routes->get('products/delete/(:num)', 'Product::delete/$1'); // Supprimer un produit par ID
