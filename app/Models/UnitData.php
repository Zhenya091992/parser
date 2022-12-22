<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitData extends Model
{
    use HasFactory;

    protected $table = 'unit_data';

    protected $fillable = [
        'user_id',
        'categories_id',
        'name',
        'value',
    ];

    protected $casts = [
        'value' => AsCollection::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
