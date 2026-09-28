<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->getAll();

        $data = [
            'title'     => 'All Tasks',
            'tasks'     => $tasks,
            'count'     => count($tasks),
        ];

        return view('tasks/index', $data);
    }
}
