<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'url',
        'name_category',
        'components_category',
    ];

    protected $casts = [
        'components_category' => AsCollection::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unitData()
    {
        return $this->hasMany(UnitData::class, 'categories_id');
    }

    public function delete()
    {
        $this->unitData()->delete();

        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
