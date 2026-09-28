<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDemoModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['username', 'full_name', 'email', 'created_at'];
    protected $useTimestamps    = false;

    /**
     * Get the single demo user
     */
    public function getDemoUser()
    {
        return $this->find(1);
    }

    /**
     * Get all users
     */
    public function getAll()
    {
        return $this->findAll();
    }
}
