<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Validation\Validation;

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

    public function new()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'New Task',
        ];

        return view('tasks/new', $data);
    }

    public function store()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Validation rules
        $rules = [
            'title'     => 'required|min_length[3]|max_length[255]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'permit_empty|in_list[pending,completed,on_hold]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $data = [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => $this->request->getPost('status') ?: 'pending',
            'is_archived' => false,
        ];

        $taskModel->createTask($data);
        return redirect()->to('/tasks')->with('success', 'Task created successfully');
    }

    public function edit($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->getById($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found');
        }

        $data = [
            'title' => 'Edit Task',
            'task'  => $task,
        ];

        return view('tasks/edit', $data);
    }

    public function update($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->getById($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found');
        }

        // Validation rules
        $rules = [
            'title'     => 'required|min_length[3]|max_length[255]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'permit_empty|in_list[pending,completed,on_hold]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => $this->request->getPost('status') ?: 'pending',
        ];

        $taskModel->updateTask($id, $data);
        return redirect()->to('/tasks')->with('success', 'Task updated successfully');
    }

    public function delete($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->getById($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found');
        }

        // Soft delete
        $taskModel->deleteTask($id);
        return redirect()->to('/tasks')->with('success', 'Task deleted successfully');
    }
}
