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
        'code',
        'icon'
    ];

    /**
     * @return HasMany
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public static function all($columns = ['*']): _IH_Category_C|\Illuminate\Database\Eloquent\Collection|array
    {
        return Category::with('listings')->get($columns);
    }

    public static function find(int $id): Model|\Illuminate\Database\Eloquent\Collection|array|Builder|_IH_Category_QB|Category|null
    {
        return Category::with('listings.user')->where('id', $id)->first();
    }

    public static function random(): Model|\Illuminate\Database\Eloquent\Collection|Builder|array|_IH_Category_QB|Category|null
    {
        $id = rand(1, Category::count());

        return Category::find($id);
    }
}
