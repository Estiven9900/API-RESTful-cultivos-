<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    protected $fillable = ['nombre', 'tipo', 'fecha'];
}
