<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasCharges extends Model
{
    use HasFactory;

    protected $table = "category_has_charges";
    protected $fillable = [
        'category_id',
        'charges_id',
    ];


}
