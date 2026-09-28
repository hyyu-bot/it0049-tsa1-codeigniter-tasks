<?php

namespace App\Controllers;

use App\Models\UserDemoModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserDemoModel();
        $user = $userModel->getDemoUser();

        $data = [
            'title'     => 'User Profile',
            'user'      => $user,
        ];

        return view('profile/index', $data);
    }
}
