<?php

namespace App\Models;

use CodeIgniter\Model;

class FormDataModel extends Model
{
    protected $table = 'form_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['data'];
}
