<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\SubDataModel;

class Menu extends BaseController
{
    protected $userData;
    protected $menuModel;
    protected $submenuData;
    protected $db, $uri;
    protected $function;
    public function __construct()
    {
        $this->userData = new UserModel();
        $this->menuModel = new MenuModel();
        $this->submenuData = new SubDataModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);
            $queryMenu = $this->submenuData->getWhere('user_menu', ['menu' => $menu])->getRowArray();
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
            'title' => 'Menu Management',
            'Menu' => $this->userData->getMenu(),
            'validation' => \Config\Services::validation(),
            'db' => \Config\Database::connect()
        ];
        return view('menu/index', $data);
    }
    public function submenu()
    {

        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->db->table('user_menu')->getWhere(['menu' => $menu])->getRowArray();
            $menu_id = $queryMenu['id'];

            $userAccess = $this->db->table('user_access_menu')->getWhere([
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);
            if ($userAccess->getRowArray() < 1) {
                // if ($userAccess->getFieldCount() > 1) {
                return redirect()->to('/auth/blocked');
            }
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Submenu Management',
            'dataSubmenu' => $this->menuModel->getSubMenu(),
            'submenu' => $this->menuModel->query("SELECT * FROM user_menu"),
            'Menu' => $this->userData->getMenu(),
            'validation' => \Config\Services::validation(),
            'db' => \Config\Database::connect()
        ];

        return view('menu/submenu', $data);
    }
    public function addSubmenu()
    {
        $validation = [
            'title'     => 'required',
            'url'       => 'required',
            'icon'      => 'required',
            'menu_id'   => 'required'
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/menu/submenu')->withInput();
        }
        $data = [
            'title' => $this->request->getVar('title'),
            'menu_id' => $this->request->getVar('menu_id'),
            'url' => $this->request->getVar('url'),
            'icon' => $this->request->getVar('icon'),
            'is_active' => $this->request->getVar('is_active')
        ];
        $this->submenuData->save($data);
        session()->setFlashdata('success', 'New Submenu added!');
        return redirect()->to('/menu/submenu');
    }
    public function addMenu()
    {
        $validation = [
            'menu' => [
                'rules' => 'required'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/menu')->withInput();
        }
        $data = [
            'menu' => $this->request->getVar('menu')
        ];
        $this->menuModel->save($data);
        session()->setFlashdata('success', 'New Menu added!');
        return redirect()->to('/menu');
    }
    public function edit()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->db->table('user_menu')->getWhere(['menu' => $menu])->getRowArray();
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
        $id = $this->request->getVar('id');
        $data = [
            'title' => 'Menu Edit',
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'data' => $this->submenuData->getDataById($id),
            'submenu' => $this->menuModel->query("SELECT * FROM user_menu"),
            'validation' => \Config\Services::validation(),
            'db' => \Config\Database::connect(),
            'Menu' => $this->userData->getMenu(),
            'menu' => $this->db->table('user_menu')->getWhere(['id' => $id])->getRowArray()
        ];
        return view('menu/edit', $data);
    }
    public function editSubmenu()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        } else {
            $role_id = session()->get('role_id');
            $menu = $this->request->uri->getSegment(1);

            $queryMenu = $this->db->table('user_menu')->getWhere(['menu' => $menu])->getRowArray();
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
        $id = $this->request->getVar('id');
        $data = [
            'title' => 'Menu Edit',
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'data' => $this->submenuData->getDataById($id),
            'submenu' => $this->menuModel->query("SELECT * FROM user_menu"),
            'validation' => \Config\Services::validation(),
            'db' => \Config\Database::connect(),
            'Menu' => $this->userData->getMenu(),
            'menu' => $this->db->table('user_menu')->getWhere(['id' => $id])->getRowArray()
        ];
        return view('menu/submenuedit', $data);
    }
    public function upMenu($id)
    {
        $validation = [
            "menu" => [
                "rules" => "required"
            ]
        ];
        if ($this->request->getVar('notRobot') != "true") {
            session()->setFlashdata('textEr', "Please, Tick to make sure you're human");
            if (!$this->validate($validation)) {
                return redirect()->to('/menu/edit/' . $id)->withInput();
            }
            return redirect()->to('/menu/edit/' . $id);
        }
        $data = [
            'id' => $id,
            'menu' => $this->request->getVar('menu')
        ];
        $this->menuModel->save($data);
        session()->setFlashdata('success', 'Menu changed successfully');
        return redirect()->to('/menu');
    }
    public function upsubmenu()
    {
        $validation = [
            'title'     => 'required',
            'menu_id'   => 'required',
            'url'       => 'required',
            'icon'      => 'required',
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/menu/edit/' . $this->request->getVar('id'))->withInput();
        }
        session()->setFlashdata('success', 'The Submenu has been edited!');
        $data = [
            'id'        => $this->request->getVar('id'),
            'title'     => $this->request->getVar('title'),
            'menu_id'   => $this->request->getVar('menu_id'),
            'url'       => $this->request->getVar('url'),
            'icon'      => $this->request->getVar('icon')
        ];
        $this->submenuData->save($data);
        return redirect()->to('/menu/submenu');
    }
    public function delete()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        }
        $id = $this->request->getVar('id');
        $data = $this->menuModel->getDataById($id);
        session()->setFlashdata('success', $data['menu'] . ' deleted successfully!');
        $this->menuModel->delete($id);
        return redirect()->to('/menu');
    }
    public function deleteSub()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        }
        $id = $this->request->getVar('id');
        $data = $this->submenuData->find($id);
        $this->submenuData->delete($id);
        session()->setFlashdata('success', $data['title'] . ' deleted successfully!');
        return redirect()->to('/menu/submenu');
    }
}
