<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ong_member extends Model
{
    use HasFactory;
    
    protected $fillable = ['username', 'name', 'password'];
}
