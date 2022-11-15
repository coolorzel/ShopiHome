<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormHasCategory extends Model
{
    use HasFactory;

    protected $table = "form_has_categories";
    protected $fillable = [
        'categoryId',
        'formId',
    ];
}
