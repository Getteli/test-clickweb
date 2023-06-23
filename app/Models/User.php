<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'sobre',
        'password',
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
        'password' => 'hashed',
    ];

    #region RELATIONSHIPS
        public function UserHasNews()
        {
            return $this->hasMany(UserHasNews::class,'user_id');
        }
    #endregion

	#region GET/SET

		/**
		 * Retorna o nome
		 *
		 * @return String
		 */
		public function getName():String
		{
			return $this->name;
		}

		/**
		 * Retorna o email
		 *
		 * @return String
		 */
		public function getEmail():String
		{
			return $this->email;
		}

		/**
		 * Retorna a descrição (sobre) o autor
		 *
		 * @return String
		 */
		public function getAbout():String
		{
			return $this->sobre;
		}
	#endregion
}
