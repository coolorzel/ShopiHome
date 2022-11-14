<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasMedia extends Model
{
    use HasFactory;

    protected $table = "category_has_media";
    protected $fillable = [
        'category_id',
        'media_id',
    ];
}
