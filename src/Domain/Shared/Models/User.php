<?php

namespace Domain\Shared\Models;

use Domain\Work\Models\Work;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $about
 * @property string $profile_picture
 * @property Collection $works
 * @property Collection $votes
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
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
        //        return app(UserFactory::class);
    }

    public function getProfilePictureUrl(): ?string
    {
        return Storage::disk('profile_pictures')->url($this->profile_picture);
    }

    public function works(): hasMany
    {
        return $this->hasMany(Work::class, 'user_id');
    }

    public function votes(): belongsToMany
    {
        return $this->belongsToMany(Work::class, 'votes');
    }
}
