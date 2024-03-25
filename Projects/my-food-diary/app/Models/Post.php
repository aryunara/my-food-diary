<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'description',
        'photo_id',
        'recipe_id'
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

    public function photo()
    {
        return $this->hasOne(Photo::class, 'id', 'photo_id');
    }

    public function recipe()
    {
        return $this->hasOne(Recipe::class, 'id', 'recipe_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
