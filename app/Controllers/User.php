<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userData, $db;
    public function __construct()
    {
        $this->userData = new UserModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'My Profile',
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];
        return view('user/index', $data);
    }
    public function edit()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];
        return view('user/edit', $data);
    }
    public function update($id)
    {
        $validation = [
            'name' => [
                'rules' => 'required'
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]'
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('/user/edit/')->withInput();
        }
        $user = $this->userData->getDataById($id);
        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = $user['image'];
        } else {
            $imageName = $image->getName();
            if ($user['image'] != "default.jpg") {
                unlink("img/profile/" . $user['image']);
            }
            $image->move('img/profile');
        }
        $data = [
            'id' => $user['id'],
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
            'image' => $imageName
        ];
        $this->userData->save($data);
        session()->setFlashdata('success', "Your account has been updated");
        return redirect()->to('/user/edit');
    }
    public function changePassword()
    {
        if (!session()->get('email')) {
            return redirect()->to('/');
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'title' => 'Change Password',
            'Menu' => $this->userData->getMenu(),
            'validation' => \Config\Services::validation(),
            'db' => \Config\Database::connect()
        ];
        return view('user/change-password', $data);
    }
    public function updatePassword()
    {
        if ($this->request->getPost('auth') == 'true') {
            $validation = [
                'currentPassword' => [
                    'rules' => 'required'
                ],
                'newPassword1' => [
                    'rules' => 'required|matches[newPassword2]|min_length[5]',
                    'errors' => [
                        'required' => 'New Password field is required.',
                        'matches' => 'The New Password field does not match The Repeat Password field.',
                        'min_length' => 'The New Password field must be at least 5 characters in length.'
                    ]
                ],
                'newPassword2' => [
                    'rules' => 'required|matches[newPassword1]|min_length[5]',
                    'errors' => [
                        'required' => 'New Repeat Password field is required.',
                        'matches' => 'The Repeat Password field does not match The new Password field.',
                        'min_length' => 'The Repeat Password field must be at least 5 characters in length.'
                    ]
                ]
            ];
            if (!$this->validate($validation)) {
                return redirect()->to('/user/changepassword')->withInput();
            }
            $passwordData = $this->userData->getAllDataByEmail(session()->get('email'))['password'];
            $newPassword = $this->request->getPost('newPassword1');
            $currentPassword = $this->request->getPost('currentPassword');
            if (!password_verify($currentPassword, $passwordData)) {
                session()->setFlashdata('error', "<div class='alert alert-danger' role='alert'>Wrong current password</div>");
                return redirect()->to('/user/changepassword');
            } else {
                if ($currentPassword == $newPassword) {
                    session()->setFlashdata('error', "<div class='alert alert-danger' role='alert'>New password Can't be the same as current password</div>");
                    return redirect()->to('/user/changepassword');
                } else {
                    // jika password benar
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->userData->UpPassword($passwordHash);
                    session()->setFlashdata('error', "<div class='alert alert-success' role='alert'>Password change!</div>");
                    return redirect()->to('/user/changepassword');
                }
            }
        } else {
            session()->setFlashdata('InError', "<span class='text-danger'>box check Most chekced</span>");
            return redirect()->to('/user/changepassword')->withInput();
        }
    }
}
