<?php

namespace Domain\Shared\Models;

use Database\Factories\UserFactory;
use Domain\Products\Enums\ProductEnum;
use Domain\Products\Models\Product;
use Domain\Work\Models\Work;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $about
 * @property string $profile_picture
 * @property Collection<Work> $works
 * @property Collection<Product> $payments
 * @property Collection<Work> $votes
 */
class User extends Authenticatable implements \Illuminate\Contracts\Auth\CanResetPassword, MustVerifyEmail
{
    use CanResetPassword;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'about',
        'username',
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function newFactory()
    {
        return app(UserFactory::class);
    }

    public function getProfilePictureUrl(): ?string
    {
        return Storage::disk('profile_pictures')->url($this->profile_picture);
    }

    public function hasVotedToday(): bool
    {
        return $this->votes()
            ->where(['votes.is_free' => true])
            ->whereDate('votes.created_at', '=', date('Y-m-d'))
            ->exists();
    }

    public function todaySumSpentOnVotes(Work $work): float
    {
        return $this->payments()
            ->where('payments.status', \Domain\Products\Enums\OrderStatus::Paid)
            ->where('payments.work_id', $work->id)
            ->where('payments.product_id', Product::where('name', ProductEnum::Voting->value)->first()->id)
            ->whereDate('payments.created_at', '=', date('Y-m-d'))
            ->sum('payments.price');
    }


    public function hasReachedVotesLimit(Work $work): bool
    {
        return $this->todaySumSpentOnVotes($work) >= 500;
    }

    public function canVoteAgain(Work $work, $newPaymentSum): bool
    {
        return $this->todaySumSpentOnVotes($work) + $newPaymentSum <= 500;
    }

    public function works(): hasMany
    {
        return $this->hasMany(Work::class, 'user_id');
    }

    public function votes(): belongsToMany
    {
        return $this->belongsToMany(Work::class, 'votes')
            ->withTimestamps();
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'payments')
            ->withPivot('work_id', 'invoice_id', 'price')
            ->withTimestamps();
    }
}
