<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'navlist_id',
        'category_name',
        'category_slug'
    ];

    public function CategoryRel()
    {
        return $this->belongsTo(Navlist::class, 'navlist_id', 'id');
    }
}
