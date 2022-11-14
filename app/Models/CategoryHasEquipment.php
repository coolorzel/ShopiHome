<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasEquipment extends Model
{
    use HasFactory;

    protected $table = "category_has_equipment";
    protected $fillable = [
        'category_id',
        'equipment_id',
    ];
}
