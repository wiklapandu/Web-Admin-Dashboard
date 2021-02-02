<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserData extends BaseController
{
    protected $userModel, $db;
    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $validation = [
            'email' => [
                'rules' => 'required|valid_email'
            ],
            'password' => [
                'rules' => 'required'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/')->withInput();
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $this->userModel->getAllDataByEmail($email);
        // User ada
        if ($user) {
            // jika user active
            if ($user['it_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    session()->set($data);
                    if ($user['role_id'] == 1) {
                        return redirect()->to('/admin');
                    }
                    return redirect()->to('/user');
                } else {
                    session()->setFlashdata('error', 'Wrong password!');
                    return redirect()->to('/')->withInput();
                }
            } else {
                session()->setFlashdata('error', 'This Email is not been activated!');
                return redirect()->to('/')->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Email is not registered!');
            return redirect()->to('/')->withInput();
        }
    }
    public function registrasi()
    {
        $validation = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => [
                'rules' => 'required|min_length[4]|matches[password2]',
                'errors' => [
                    'min_length' => 'Password too short!',
                    'matches' => 'password dont match!'
                ]
            ],
            'password2' => 'required|matches[password]'
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/registration')->withInput();
        }
        $email = $this->request->getPost('email');
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $email,
            'image' => 'default.jpg',
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'it_active' => 0
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];
        // Simpan data
        $this->userModel->save($data);

        // Insert Token
        $this->db->table('user_token')->insert($user_token);

        // kirim Email
        $this->_sendEmail($token, $email, 'verify');

        session()->setFlashdata('success', 'Your account has been created. Please, activate your account');
        return redirect()->to('/');
    }
    private function _sendEmail($token, $emailTarget, string $type)
    {
        // dd($emailTarget);
        $email = \Config\Services::email();
        // $email->initialize($config);

        $email->setFrom('wiklaoffice@gmail.com', 'WEB WIKLA');
        $email->setTo($emailTarget);
        if ($type == 'verify') {
            $email->setSubject('Account Verification');
            $email->setMessage('Click this link to verify your account : <a href="' . base_url('auth') . '/verify?email=' . $emailTarget . '&token=' . urlencode($token) . '">Active</a>');
        }
        if (!$email->send()) {
            $email->printDebugger();
            die;
        }
    }
}
