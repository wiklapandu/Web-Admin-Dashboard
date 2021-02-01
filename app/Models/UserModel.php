<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email', 'image', 'password', 'role_id', 'it_active'];
    protected $useTimestamps = true;
    public function getAllDataByEmail($email)
    {
        return $this->db->table('user')->getWhere(['email' => $email])->getRowArray();
    }
    public function getMenu()
    {
        $role_id = session()->get('role_id');
        $query = "SELECT `user_menu`.`id`, menu FROM `user_menu`
                    JOIN `user_access_menu` ON
                    `user_menu`.`id` = `user_access_menu`.`menu_id` 
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
        return $this->db->query($query)->getResultArray();
    }
    public function query($query)
    {
        return $this->db->query($query)->getResultArray();
    }
    public function insertByTable($table, $data)
    {
        return $this->table($table)->save($data);
    }
    public function getDataById($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }
    public function UpPassword($password)
    {
        return $this->db->table($this->table)->where('email', session()->get('email'))->update(['password' => $password]);
    }
}
