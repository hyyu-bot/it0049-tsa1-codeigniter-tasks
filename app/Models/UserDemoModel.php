<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\Validation;

class UserDemoModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['username', 'full_name', 'email', 'password'];
    protected $useTimestamps    = false;

    /**
     * Get the single demo user
     */
    public function getDemoUser()
    {
        return $this->find(1);
    }

    /**
     * Get user by username
     */
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Update user password
     */
    public function updatePassword($userId, $hashedPassword)
    {
        return $this->update($userId, ['password' => $hashedPassword]);
    }
}
