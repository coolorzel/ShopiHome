<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeoffer extends Model
{
    use HasFactory;

    protected $table = "typeoffer";
    protected $fillable = [
      'name',
    ];
}
