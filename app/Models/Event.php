<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'category_id',
    'partner_id',
    'title',
    'description',
    'date',
    'end_date',
    'location',
    'price',
    'stock',
    'poster_path'
];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function partner() {
        return $this->belongsTo(Partner::class);
    }
}
