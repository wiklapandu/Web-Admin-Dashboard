<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SubDataModel;
use CodeIgniter\Pager\Pager;

class Author extends BaseController
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
        $page = $this->request->getVar('pages');
        $keyword = $this->request->getVar('keyword');
        if ($keyword != "" || $page != "") {
            $pageCount = $page;
            $pagin = $this->userData->like('name', $keyword);
        } else {
            $pagin = $this->userData;
            $pageCount = 10;
        }
        $data = [
            'user' => $this->userData->getAllDataByEmail(session()->get('email')),
            'User' => $pagin->paginate($pageCount, 'user'),
            'pager' => $this->userData->pager,
            'title' => 'Users',
            'role' => $this->db->table('user_role')->get()->getResultArray(),
            'Menu' => $this->userData->getMenu(),
            'db' => \Config\Database::connect()
        ];
        return view('author/index', $data);
    }
}
