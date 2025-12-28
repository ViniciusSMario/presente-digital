<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'template',
        'slug',
        'is_paid',
        'paid',
        'price_cents'
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'price_cents' => 'integer'
    ];

    protected $appends = ['price'];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriceAttribute()
    {
        return number_format(($this->price_cents ?? 0) / 100, 2, '.', '');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($gift) {
            if (empty($gift->slug)) {
                $base = $gift->title ? Str::slug($gift->title) : Str::random(8);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . Str::random(4);
                    $i++;
                    if ($i > 10) break;
                }
                $gift->slug = $slug;
            }
        });
    }
}
