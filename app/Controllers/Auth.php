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
    protected $subdataModel, $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->menuModel = new MenuModel();
        $this->subdataModel = new SubDataModel();
        $this->db = \Config\Database::connect();
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
        session()->setFlashdata('actionTrue', '<div class="alert alert-success" role="alert">you have successfully logged out</div>');
        return redirect()->to('/');
    }

    public function forgotPassword()
    {
        if (session()->get('role_id')) {
            return redirect()->to('/user');
        }
        $data = [
            'title' => 'Forgot Password',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/forgot-password', $data);
    }

    public function verify()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $this->db->table('user')->getWhere(['email' => $email])->getRowArray();
        if ($user) {
            $user_token = $this->db->table('user_token')->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                // Waktu Validation
                if ((time() - $user_token['date_created']) < (60 * 60 * 24)) {
                    $this->db->table('user')->update(['it_active' => 1], ['email' => $email]);
                    $this->db->table('user_token')->delete(['email' => $email]);
                    session()->setFlashdata('actionTrue', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    return redirect()->to('/');
                } else {
                    $this->db->table('user')->delete(['email' => $email]);
                    $this->db->table('user_token')->delete(['email' => $email]);
                    session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token</div>');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email</div>');
            return redirect()->to('/');
        }
    }
    public function resetpassword()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $this->db->table('user')->getWhere(['email' => $email])->getRowArray();
        if ($user) {
            $user_token = $this->db->table('user_token')->getWhere([
                'email' => $email,
                'token' => $token
            ])->getRowArray();
            if ($user_token) {
                if ((time() - $user_token['date_created']) < (60 * 10)) {
                    session()->set('reset_email', $email);
                    return redirect()->to('/auth/changepassword');
                } else {
                    $this->db->table('user_token')->delete(['email' => $email]);
                    session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    return redirect()->to('/auth/forgotpassword');
                }
            } else {
                session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token or email</div>');
                return redirect()->to('/auth/forgotpassword');
            }
        } else {
            session()->setFlashdata('actionTrue', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email</div>');
            return redirect()->to('/auth/forgotpassword');
        }
    }
    public function changepassword()
    {
        if (session()->get('role_id')) {
            return redirect()->to('/user');
        }
        if (!session()->get('reset_email')) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/change-password', $data);
    }
    //--------------------------------------------------------------------

}
