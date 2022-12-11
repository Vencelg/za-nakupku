<?php

namespace App\Models;

use App\Exceptions\ModelException;
use DB;
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

    /**
     * @param int $id
     *
     * @return Listing|array|Builder|Collection|Model|_IH_Listing_C|_IH_Listing_QB|null
     */
    public static function find(int $id): Listing|array|Builder|Collection|Model|_IH_Listing_C|_IH_Listing_QB|null
    {
        return Listing::with(['user.listings', 'category.listings', 'listingImages'])->find($id);
    }

    public static function all($columns = ['*']): Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator|_IH_Listing_C|array
    {
        $listings = Listing::with(['user.listings', 'category.listings', 'listingImages']);
        $code = request('category');
        $search = request('search');
        $perPage = (int) request('perPage');

        if (is_string($code)) {
            $category = Category::where('code', $code)->first();

            $listings->where('category_id', $category?->id);
        }

        if (is_string($search)) {
            $listings->where('name', 'ILIKE', '%' . $search . '%');
        }

        return $listings->paginate($perPage);
    }
}
