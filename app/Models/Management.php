<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'project_management';

    protected $fillable = ['title', 'text', 'status', 'competent'];

    
}
