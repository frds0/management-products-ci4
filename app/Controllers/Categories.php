<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();

        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function insert()
    {
        $this->categoryModel->save([
            'category_name'  => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/categories')->with('success', 'Category Created Successfull')->with('error', 'Failed to Save Category');
    }

    public function edit($id)
    {
        $data['category'] = $this->categoryModel->find($id);

        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $this->categoryModel->update($id, [
            'category_name'  => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/categories')->with('success', 'Category Updated Successfull')->with('error', 'Failed to Update Category');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);

        return redirect()->to('/categories')->with('success', 'Category Deleted Successfull')->with('error', 'Failed to Delete Category');
    }
}
