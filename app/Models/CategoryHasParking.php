<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasParking extends Model
{
    use HasFactory;

    protected $table = "category_has_parkings";
    protected $fillable = [
        'category_id',
        'parking_id',
    ];
}
