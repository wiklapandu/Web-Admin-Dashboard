<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SubDataModel;

class Role extends BaseController
{
    protected $userData, $db, $subdataModel;
    public function __construct()
    {
        $this->userData = new UserModel();
        $this->db = \Config\Database::connect();
        $this->subdataModel = new SubDataModel();
    }
    public function roleEdit($id)
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            if (session()->get('role_id') != 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Role',
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect(),
            'Role' => $this->db->table('user_role')->getWhere(['id' => $id])->getRowArray()
        ];
        return view('admin/role-edit', $data);
    }
    public function addrole()
    {
        $validation = [
            "role" => [
                'rules' => 'required'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/admin/role')->withInput();
        }
        $insert = [
            "role" => $this->request->getPost('role')
        ];
        $this->db->table('user_role')->insert($insert);
        session()->setFlashdata('success', 'Role has been created!');
        return redirect()->to('/admin/role');
    }
    public function roleaccess($id)
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            if (session()->get('role_id') != 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Role',
            'validation' => \Config\Services::validation(),
            'role' => $this->db->table('user_role')->getWhere(['id' => $id])->getRowArray(),
            'Menu' => $this->userData->getMenu(),
            'menu' => $this->db->table('user_menu')->where('id !=', 1)->get()->getResultArray(),
            'db' => \Config\Database::connect()
        ];
        return view('admin/role-access', $data);
    }
    public function roledelete()
    {
        $roleId = $this->request->getPost('roleId');
        $this->db->table('user_role')->delete(['id' => $roleId]);
        session()->setFlashdata('success', 'Role has deleted');
        return redirect()->to('/admin/role');
    }
    public function changeAccess()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            if (session()->get('role_id') != 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $menu_id = $this->request->getPost('menuId');
        $role_id = $this->request->getPost('roleId');
        $table = $this->db->table('user_access_menu');
        $data = [
            "role_id" => $role_id,
            "menu_id" => $menu_id
        ];
        $result = $table->where($data)->get();
        if ($result->getRowArray() < 1) {
            $table->insert($data);
        } else {
            $table->delete($data);
        }
        session()->setFlashdata('success', "Role Access Change");
    }
}
