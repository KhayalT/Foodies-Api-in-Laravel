<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant',
        'star',
        'review'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
