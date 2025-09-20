<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['category_id', 'product_name', 'stok'];

    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = ['products.id', 'categories.category_name', 'products.product_name', 'products.stok'];
    protected $column_search = ['products.product_name', 'categories.category_name', 'products.stok'];
    protected $order = ['products.id' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;


    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = Services::request();

        $this->dt = $this->db->table('products')
            ->select('products.id, products.product_name, products.stok, categories.category_name')
            ->join('categories', 'categories.id = products.category_id')->where('products.deleted_at', null);
    }

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();

        log_message('debug', 'SQL Query: ' . $this->db->getLastQuery());
        return $query->getResultArray();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table)->where('deleted_at', null);
        return $tbl_storage->countAllResults(false);
    }

    public function productWithCategory()
    {
        return $this->select('products.*, categories.category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();
    }

    public function productWithCategoryID($id)
    {
        return $this->select('products.*, categories.category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->find($id);
    }

    public function countProducts()
    {
        $query = $this->db->table('products')->where('deleted_at', null)->get();
        $count_data = $query->getNumRows();

        return $count_data;
    }

    public function countProductsStock()
    {
        $query = $this->db->table('products')->selectSum('stok')->where('deleted_at', null)->get();
        $count_stock = $query->getRow();

        return $count_stock->stok;
    }
}
