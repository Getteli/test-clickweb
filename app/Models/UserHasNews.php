<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasNews extends Model
{
    use HasFactory;
	protected $table = "user_has_news";
	protected $primaryKey = ['user_id', 'news_id'];
	public $incrementing = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'user_id',
        'news_id',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
	];

	#region RELATIONSHIPS

		public function User()
		{
			return $this->belongsTo(User::class);
		}

		public function News()
		{
			return $this->belongsTo(News::class);
		}

	#endregion
	
	#region METHODS
    #endregion
}