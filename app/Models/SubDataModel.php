<?php

namespace App\Models;

use CodeIgniter\Model;

class SubDataModel extends Model
{
    protected $table = 'user_sub_menu';
    protected $allowedFields = ['menu_id', 'title', 'url', 'icon', 'is_active'];
    public function getDataById($id)
    {
        return $this->table('user_sub_menu')->where(['id' => $id])->first();
    }
    public function getWhere($table, $where)
    {
        return $this->db->table($table)->getWhere($where);
    }
}
