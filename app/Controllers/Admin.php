<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SubDataModel;

class Admin extends BaseController
{
    protected $userData, $db, $subdataModel;
    public function __construct()
    {
        $this->userData = new UserModel();
        $this->db = \Config\Database::connect();
        $this->subdataModel = new SubDataModel();
    }
    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->subdataModel->getWhere('user_menu', ['menu' => $menu])->getRowArray();
            $menu_id = $queryMenu['id'];


            $userAccess = $this->db->table('user_access_menu')->getWhere([
                'menu_id' => $menu_id,
                'role_id' => $role_id
            ]);
            if ($userAccess->getRowArray() < 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Dashboard',
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];

        return view('admin/index', $data);
    }
    public function role()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->subdataModel->getWhere('user_menu', ['menu' => $menu])->getRowArray();
            $menu_id = $queryMenu['id'];


            $userAccess = $this->db->table('user_access_menu')->getWhere([
                'menu_id' => $menu_id,
                'role_id' => $role_id
            ]);
            if ($userAccess->getRowArray() < 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Role',
            'validation' => \Config\Services::validation(),
            'role' => $this->db->table('user_role')->get()->getResultArray(),
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];

        return view('admin/role', $data);
    }
    public function Charts()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_Id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->subdataModel->getWhere('user_menu', ['menu' => $menu])->getRowArray();
            $menu_id = $queryMenu['id'];


            $userAccess = $this->db->table('user_access_menu')->getWhere([
                'menu_id' => $menu_id,
                'role_id' => $role_Id
            ]);
            if ($userAccess->getRowArray() < 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Charts',
            // 'role' => $this->db->table('user_role')->getWhere(['id' => $roleId])->getRowArray(),
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];

        return view('admin/charts', $data);
    }
}
