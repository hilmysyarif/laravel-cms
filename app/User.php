<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait, ResourceableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'provider_id',
        'provider',
        'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param $userData
     * @return static
     */
    public static function findByEmailOrCreate($userData)
    {
        $user = User::where('email', $userData->email)->first();

        if( ! $user)
        {
            $user = User::create([
                'provider_id' => $userData->id,
                'provider' => $userData->provider,
                'name' => $userData->name,
                'email' => $userData->email,
                'avatar' => $userData->avatar,
            ]);
        }

        static::checkIfUserNeedsUpdating($userData, $user);

        return $user;
    }

    /**
     * @param $userData
     * @param $user
     */
    public static function checkIfUserNeedsUpdating($userData, $user)
    {
        $socialData = [
            'provider_id' => $userData->id,
            'provider'    => $userData->provider,
            'name'        => $userData->name,
            'avatar'      => $userData->avatar,
        ];
        $dbData = [
            'provider_id' => $user->provider_id,
            'provider'    => $user->provider,
            'name'        => $user->name,
            'avatar'      => $user->avatar,
        ];

        if ( ! empty(array_diff($socialData, $dbData)))
        {
            $user->provider_id = $userData->id;
            $user->provider    = $userData->provider;
            $user->name        = $userData->name;
            $user->avatar      = $userData->avatar;
            $user->save();
        }
    }
}
