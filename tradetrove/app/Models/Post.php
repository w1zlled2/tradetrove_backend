<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'address',
        'price',
        'condition_id',
        'status_id',
        'connect_type_id',
        'phone'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
