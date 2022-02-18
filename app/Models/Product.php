<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function thumbnailRel()
    // {
    //     return $this->belongsTo(ThumbnailImg::class, 'product_id', 'id');
    // }

    public function subcategotyRel()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
