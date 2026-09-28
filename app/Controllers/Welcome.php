<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->getTodaysTasks();

        $data = [
            'title'     => 'Tasks for Today',
            'tasks'     => $tasks,
            'count'     => count($tasks),
        ];

        return view('welcome/index', $data);
    }
}
