<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasSecurity extends Model
{
    use HasFactory;

    protected $table = "category_has_securities";
    protected $fillable = [
        'category_id',
        'security_id',
    ];
}
