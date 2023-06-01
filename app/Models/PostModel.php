<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primarykey = 'id';
    protected $allowedFields = ['email','title','slug','body'];
}