<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inverstor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email'
    ];
    protected $table = 'inverstor';
}
