<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $casts = [
        'components_category' => AsCollection::class,
    ];
}
