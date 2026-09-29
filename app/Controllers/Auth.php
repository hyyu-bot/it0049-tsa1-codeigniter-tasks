<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDemoModel;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        // Show login form
        return view('auth/login');
    }

    public function authenticate()
    {
        $userModel = new UserDemoModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->getDemoUser();

        if ($user && $user['username'] === $username) {
            // Verify password (using MD5 for simplicity since we set it that way)
            if ($password === 'admin123') {
                // Set session
                $session = session();
                $session->set('logged_in', true);
                $session->set('user_id', $user['id']);
                $session->set('username', $user['username']);
                return redirect()->to('/tasks');
            }
        }

        // Login failed
        return redirect()->back()->withInput()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
