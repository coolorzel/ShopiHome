<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryForm extends Model
{
    use HasFactory;

    protected $table = "category_forms";
    protected $fillable = [
        'name',
        'type',
    ];
}
