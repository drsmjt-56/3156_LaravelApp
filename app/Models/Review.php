<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'transaction_id',
        'rating',
        'review',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function event()
{
    return $this->hasOneThrough(
        Event::class,
        Transaction::class,
        'id',
        'id',
        'transaction_id',
        'event_id'
    );
}
}