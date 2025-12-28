<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'gift_id',
        'type',
        'path'
    ];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
