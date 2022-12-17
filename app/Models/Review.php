<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'created_by_id',
        'header',
        'body',
        'rating'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public static function all($columns = ['*'])
    {
        $reviews = Review::with(['author', 'user']);
        $userId = request('userId');
        $authorId = request('authorId');
        $rating = is_string(request('rating')) ? intval(request('rating')) : null;

        if (!is_null($userId)) {
            $reviews->where('user_id', $userId);
        }

        if (!is_null($authorId)) {
            $reviews->where('created_by_id', $authorId);
        }

        if (!is_null($rating)) {
            $reviews->where('rating', $rating);
        }

        return $reviews->get($columns);
    }
}
