<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string
    {
        $categories = new CategoryModel();
        $products = new ProductModel();

        $data['jmlCategories'] = $categories->countCategories();
        $data['jmlProducts'] = $products->countProducts();
        $data['jmlStokProducts'] = $products->countProductsStock();

        return view('dashboard', $data);
    }
}
