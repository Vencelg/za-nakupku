<?php

namespace App\Models;

use App\Exceptions\ModelException;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelIdea\Helper\App\Models\_IH_Listing_C;
use LaravelIdea\Helper\App\Models\_IH_Listing_QB;

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

    /**
     * @var string[]
     */
    protected $with = [
        'listingImages'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withAvg('reviewsRecipientOf', 'rating')->withCount('reviewsRecipientOf');
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

    /**
     * @param int $id
     *
     * @return Listing|array|Builder|Collection|Model|_IH_Listing_C|_IH_Listing_QB|null
     */
    public static function find(int $id): Listing|array|Builder|Collection|Model|_IH_Listing_C|_IH_Listing_QB|null
    {
        return Listing::with(['user.listings', 'user.reviewsRecipientOf.author', 'category', 'listingImages'])->find($id);
    }

    /**
     * @param $columns
     *
     * @return Collection|LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator|_IH_Listing_C|array
     */
    public static function all(
        $columns = ['*']): Collection|LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator|_IH_Listing_C|array
    {
        $listings = Listing::with(['user', 'category', 'listingImages']);
        $code = request('category');
        $search = request('search');
        $minPrice = is_string(request('minPrice')) ? intval(request('minPrice')) : null;
        $maxPrice = is_string(request('maxPrice')) ? intval(request('maxPrice')) : null;
        $orderBy = request('orderBy');
        $perPage = (int) request('perPage');

        if (is_string($code)) {
            $category = Category::where('code', $code)->first();

            $listings->where('category_id', $category?->id);
        }

        if (is_string($search)) {
            $listings->where('name', 'ILIKE', '%' . $search . '%');
        }

        if (is_int($minPrice)) {
            $listings->where('price', '>=', $minPrice);
        }

        if (is_int($maxPrice)) {
            $listings->where('price', '<=', $maxPrice);
        }

        if (is_string($orderBy)) {
            $listings->orderBy($orderBy);
        }

        return $listings->paginate($perPage);
    }
}
