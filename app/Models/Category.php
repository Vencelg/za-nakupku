<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelIdea\Helper\App\Models\_IH_Category_C;
use LaravelIdea\Helper\App\Models\_IH_Category_QB;

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

    /**
     * @return HasMany
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public static function random(): Builder
    {
        $max = Category::count();

        return Category::where('id', rand(1, $max));
    }
}
