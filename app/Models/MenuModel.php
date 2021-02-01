<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'user_menu';
    protected $allowedFields = ['menu'];
    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*,user_menu.menu
                FROM user_sub_menu JOIN user_menu
                ON user_sub_menu.menu_id = user_menu.id
                ";
        return $this->db->query($query)->getResultArray();
    }
    public function query($query)
    {
        return $this->db->query($query)->getResultArray();
    }
    public function getDataById(int $id)
    {
        return $this->db->table($this->table)->getWhere(['id' => $id])->getRowArray();
    }
    public function insertSubmenu($table, $data)
    {
        return $this->table($table)->save($data);
    }
}
