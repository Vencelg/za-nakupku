<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code'
    ];

    protected $with = [
        'listings'
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}
