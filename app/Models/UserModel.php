<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields  = [
        'name',
        'email',
        'password',
        'active',
        'administrator',
        'reset_token',
        'reset_expires_at',
        'profile_image',
        'profile_picture',
        'activation_token'
    ];
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
}
