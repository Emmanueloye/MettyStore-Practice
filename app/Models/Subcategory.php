<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'navlist_id',
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];

    public function categoryRel()
    {
        return $this->belongsTo(Navlist::class, 'navlist_id', 'id');
    }

    public function SubCatRel()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
