<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['category_name'];

    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function countCategories()
    {
        $query = $this->db->table('categories')->where('deleted_at', null)->get();
        $jumlah_data = $query->getNumRows();

        return $jumlah_data;
    }
}
