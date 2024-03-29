<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LaravelIdea\Helper\App\Models\_IH_User_C;
use LaravelIdea\Helper\App\Models\_IH_User_QB;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'name',
        'email',
        'password',
        'is_admin',
        'phone_number',
        'location',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * @return HasMany
     */
    public function reviewsAuthorOf(): HasMany
    {
        return $this->hasMany(Review::class, 'created_by_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function reviewsRecipientOf(): HasMany
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function favouriteListings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class, 'favourites')->with([
            'user' => function ($query) {
                $query->withCount('reviewsRecipientOf')->withAvg('reviewsRecipientOf', 'rating');
            }
        ]);
    }

    /**
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * @param $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $url = config('app.FRONTEND_PASSWORD_RESET_URL') . $token . '&email=' . $this->email;

        $this->notify(new PasswordResetNotification($url, $this->email));
    }

    /**
     * @param int $id
     *
     * @return Model|_IH_User_QB|Collection|array|Builder|User|_IH_User_C|null
     */
    public static function find(int $id): Model|_IH_User_QB|Collection|array|Builder|User|_IH_User_C|null
    {
        return User::with(['listings', 'reviewsAuthorOf.user', 'reviewsRecipientOf.author', 'favouriteListings'])
            ->withAvg('reviewsRecipientOf', 'rating')
            ->withCount('reviewsRecipientOf')
            ->find($id);
    }
}
