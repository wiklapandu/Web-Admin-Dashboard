<?php

use App\Models\MenuModel;
use App\Controllers\Admin as menu;
use App\Controllers\BaseController as Controller;
use App\Controllers\BaseController;

function check_login()
{
    if (!session()->get('email')) {
        return redirect()->to('/');
    } else {
        $con = new menu;
        $db = \Config\Database::connect();
        $role_id = session()->get('role_id');
        $menu = $con->UrSegment(1);

        $queryMenu = $db->table('user_menu')->getWhere(['menu' => $menu])->getRowArray();
        $menu_id = $queryMenu['id'];
        $userAccess = $db->table('user_access_menu')->getWhere([
            'menu_id' => $menu_id,
            'role_id' => $role_id
        ]);
        if ($userAccess->getRowArray() < 1) {
            // if ($userAccess->getFieldCount() > 1) {
            return redirect()->to('/auth/blocked');
        }
    }
}
function check_access($role_id, $menu_id)
{
    $ci = \Config\Database::connect();
    $result = $ci->table('user_access_menu')->getWhere([
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);
    if ($result->getRowArray() > 0) {
        return "checked='checked'";
    }
}
