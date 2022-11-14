<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasHeating extends Model
{
    use HasFactory;

    protected $table = "category_has_heatings";
    protected $fillable = [
        'category_id',
        'heating_id',
    ];
}
