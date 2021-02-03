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
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
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
    public function forgotPassword()
    {
        $validation = [
            'email' => [
                'rules' => 'required|valid_email'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/auth/forgotpassword')->withInput();
        }
        $email = $this->request->getPost('email');
        $user = $this->db->table('user')->getWhere([
            'email' => $email,
            'it_active' => 1
        ])->getRowArray();
        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            // insert ke databases
            $this->db->table('user_token')->insert($user_token);

            // kirim email
            $this->_sendEmail($token, $email, 'forgot');

            session()->setFlashdata('actionTrue', '<div class="alert alert-success text-left" role="alert">Please check your email to reset your password!</div>');
            return redirect()->to('/auth/forgotpassword');
        } else {
            session()->setFlashdata('actionTrue', '<div class="alert alert-danger text-left" role="alert">Email is not registered or activated</div>');
            return redirect()->to('/auth/forgotpassword');
        }
    }
    public function changePassword()
    {
        $validation = [
            "password" => [
                'rules' => 'required|min_length[4]|matches[Repassword]'
            ],
            "Repassword" => [
                'rules' => 'required|min_length[4]|matches[password]'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/auth/changepassword')->withInput();
        }
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $email = session()->get('reset_email');

        $this->db->table('user')->update(['password' => $password], ['email' => $email]);
        session()->remove('reset_email');

        session()->setFlashdata('actionTrue', '<div class="alert alert-success" role="alert">Password has been change!</div>');
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
            $email->setMessage('
                            <h2 style="color: black;">
                                Please Verify Your Email Address
                            </h2>
                            <br>
                            <a href="' . base_url('auth') . '/verify?email=' . $emailTarget . '&token=' . urlencode($token) . '" style="text-decoration: none; color: white; background-color: #007bff;padding: 10px; border-radius: 5px;">Verify your email</a>
                                <br>
                                <br>
                            <p  style="color: black;">
                                Hello ' . $emailTarget . ',
                                <br>
                                <br>
                                Thank you for interest in Web Wikla.
                                <br>
                                <br>
                                Welcome to our team
                            </p>
                    ');
        } elseif ($type == 'forgot') {
            $email->setSubject('Reset Password');
            $email->setMessage('Click this link to reset your password : <a href="' . base_url('auth') . '/resetpassword?email=' . $emailTarget . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        if (!$email->send()) {
            $email->printDebugger();
            die;
        }
    }
}
