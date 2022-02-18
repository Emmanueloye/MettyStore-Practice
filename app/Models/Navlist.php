<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'navlist_name',
        'navlist_slug'
    ];
}
