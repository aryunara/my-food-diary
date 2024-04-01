<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_id',
        'liker_id',
    ];

    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
