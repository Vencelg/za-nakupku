<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelIdea\Helper\App\Models\_IH_Listing_C;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class Listing extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'info',
        'price',
        'phone_number',
        'location',
        'ending'
    ];

    protected $with =[
        'listingImages'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function listingImages(): HasMany
    {
        return $this->hasMany(ListingImage::class, 'listing_id');
    }

    public static function find(int $id): Listing|array|\Illuminate\Database\Eloquent\Builder|Collection|Model|_IH_Listing_C|\LaravelIdea\Helper\App\Models\_IH_Listing_QB|null
    {
        return Listing::with(['user.listings', 'category.listings', 'listingImages'])->find($id);
    }

    public static function all($columns = ['*']): Collection|_IH_Listing_C|array
    {
        if (!is_null(request('categoryId'))) {
            return parent::where('category_id', request('categoryId'))->get();
        }else {
            return parent::all($columns);
        }
    }
}
