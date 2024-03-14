<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class Photo extends Model
{

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'path',
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

    public static function getPhotosByUserId($userId) : \Illuminate\Support\Collection
    {
        return DB::table('photos')
            ->join('posts', 'photos.id', '=', 'posts.photo_id')
            ->where('posts.user_id', $userId)
            ->select('photos.*')
            ->get();
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id', 'photo_id');
    }
}
