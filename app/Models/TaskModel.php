<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];
    protected $useTimestamps    = false;

    /**
     * Get all tasks ordered by date (newest first)
     */
    public function getAll()
    {
        return $this->orderBy('task_date', 'DESC')->findAll();
    }

    /**
     * Get only today's tasks
     */
    public function getTodaysTasks()
    {
        $today = date('Y-m-d');
        return $this->where('task_date', $today)->orderBy('created_at', 'ASC')->findAll();
    }

    /**
     * Get a task by ID
     */
    public function getById($id)
    {
        return $this->find($id);
    }
}
