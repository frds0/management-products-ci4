<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel, $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->productWithCategory();

        return view('products/index', $data);
    }

    public function ajaxList()
    {
        $productModel = $this->productModel;
        $list = $productModel->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');

        foreach ($list as $key) {
            $no++;
            $row = [
                'no'            => $no,
                'product_name'  => $key['product_name'],
                'category_name' => $key['category_name'],
                'stok'          => $key['stok'],
                'action'        => '<button data-bs-toggle="modal" data-bs-target="#viewDetailProduct' . $key['id'] . '" class="btn btn-info btn-sm">View</button>
                <a href="' . base_url('products/edit/' . $key['id']) . '" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="' . base_url('products/delete/' . $key['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</a>'
            ];
            $data[] = $row;
        }

        $output = [
            "draw" => intval($this->request->getPost('draw')),
            "recordsTotal" => $productModel->countAll(),
            "recordsFiltered" => $productModel->countFiltered(),
            "data" => $data
        ];

        return $this->response->setJSON($output);
    }

    public function create()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('products/create', $data);
    }

    public function insert()
    {
        $this->productModel->save([
            'category_id'  => $this->request->getPost('category_id'),
            'product_name'  => $this->request->getPost('product_name'),
            'stok'  => $this->request->getPost('stok')
        ]);

        return redirect()->to('/products')->with('success', 'Product Created Successfull')->with('error', 'Failed to Save Product');
    }

    public function edit($id)
    {
        $data['product'] = $this->productModel->productWithCategoryID($id);
        $data['categories'] = $this->categoryModel->findAll();

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $this->productModel->update($id, [
            'category_id'  => $this->request->getPost('category_id'),
            'product_name'  => $this->request->getPost('product_name'),
            'stok'  => $this->request->getPost('stok'),
        ]);

        return redirect()->to('/products')->with('success', 'Products Updated Successfull')->with('error', 'Failed to Update Products');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to('/products')->with('success', 'Product Deleted Successfull')->with('error', 'Failed to Delete Product');
    }
}
