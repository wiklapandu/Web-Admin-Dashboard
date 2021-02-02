<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;

use App\Models\MenuModel;

use App\Models\SubDataModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $menuModel;
    protected $subdataModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->menuModel = new MenuModel();
        $this->subdataModel = new SubDataModel();
    }
    public function index()
    {
        if (session()->get('role_id')) {
            return redirect()->to('/user');
        }
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }
    public function registration()
    {
        if (session()->get('role_id')) {
            return redirect()->to('/user');
        }
        $data = [
            'title' => 'Registration',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registration', $data);
    }
    public function blocked()
    {
        $data = [
            'title' => '404',
            'user' => $this->userModel->getAllDataByEmail(session()->get('email')),
            'Menu' => $this->userModel->getMenu(),
            'db' => \Config\Database::connect()
        ];
        return view('auth/blocked', $data);
    }
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('actionTrue', "you have successfully logged out");
        return redirect()->to('/');
    }

    public function verify()
    {
    }
    //--------------------------------------------------------------------

}
