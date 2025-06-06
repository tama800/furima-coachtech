<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'brand',
        'condition',
        'description',
        'image',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories')
        ->withTimestamps();
    }

    public static function getConditionLabels()
    {
        return [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い',
        ];
    }

    public function getConditionLabelAttribute()
    {
        return self::getConditionLabels()[$this->condition] ?? '不明';
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
}