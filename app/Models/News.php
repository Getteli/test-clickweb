<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
	protected $table = "news";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
        'slug',
		'title',
        'subtitle',
        'content'
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
		public function UserHasNews()
		{
			return $this->hasMany(UserHasNews::class, 'news_id');
		}
	#endregion

	#region METHODS

		/**
		 * Metodo que será responsável por pegar todas as noticias
		 *
		 * @return News[]
		 **/
		public function listAll()
		{
			try
			{
				return $this->paginate(5);
			}
			catch (\Throwable $e)
			{
				return [];
			}
		}

		/**
		 * Metodo que pega uma noticia pelo seu slug
		 *
		 * @param String $slug nome unico do post
		 * @return News|boolean
		 **/
		public function getNewsFromSlug(String $slug)
		{
			try
			{
				$news = $this->where('slug', $slug)->first();

				if (!$news)
				{
					throw new \Exception(false);
				}

				return $news;
			}
			catch (\Throwable $e)
			{
				return false;
			}
		}
    #endregion

	#region GET/SET

		/**
		 * Retorna o titulo
		 *
		 * @return String
		 */
		public function getTitle():String
		{
			return $this->title;
		}

		/**
		 * Retorna o subtitulo
		 *
		 * @return String
		 */
		public function getSubTitle():String
		{
			return $this->subtitle;
		}

		/**
		 * Retorna o slug
		 *
		 * @return String
		 */
		public function getSlug():String
		{
			return $this->slug;
		}

		/**
		 * Retorna o conteudo da noticia
		 *
		 * @return String
		 */
		public function getContent():String
		{
			return $this->content;
		}

		/**
		 * Retorna o nome do autor
		 *
		 * @return String
		 */
		public function getNameAuthor():String
		{
			return $this->UserHasNews[0]->User->getName();
		}

		/**
		 * Retorna a descrição do autor
		 *
		 * @return String
		 */
		public function getAboutAuthor():String
		{
			return $this->UserHasNews[0]->User->getAbout();
		}
	#endregion
}