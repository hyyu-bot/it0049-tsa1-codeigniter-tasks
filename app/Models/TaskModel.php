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
    protected $allowedFields    = ['title', 'status', 'task_date', 'is_archived'];
    protected $useTimestamps    = true;

    /**
     * Get all active (non-archived) tasks ordered by date (newest first)
     */
    public function getAll()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'DESC')
                    ->findAll();
    }

    /**
     * Get only today's active tasks
     */
    public function getTodaysTasks()
    {
        $today = date('Y-m-d');
        return $this->where('task_date', $today)
                    ->where('is_archived', 0)
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }

    /**
     * Get a task by ID
     */
    public function getById($id)
    {
        return $this->find($id);
    }

    /**
     * Create a new task
     */
    public function createTask($data)
    {
        // Ensure is_archived is set to 0
        $data['is_archived'] = 0;
        return $this->insert($data);
    }

    /**
     * Update an existing task
     */
    public function updateTask($id, $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Soft delete a task (mark as archived)
     */
    public function deleteTask($id)
    {
        return $this->update($id, ['is_archived' => 1]);
    }
}
