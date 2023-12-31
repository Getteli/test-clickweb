<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[Controller::class, 'home'])
    ->name('home');

Route::get('/post/{slug}',[Controller::class, 'openPost'])
    ->name('open.post');
 
	#region FILMES
		Route::group(['as' => 'filmes.', 'prefix' => 'filmes'], function()
		{
            /**
             * rota da pagina de filmes
             */
			Route::get('/',[Controller::class, 'homeFilmes'])
				->name('home');
            
			/**
			 * paginacao da api proxima ou anterior
			 */
			Route::get('/page/{page}',[Controller::class, 'pageFilmes'])
				->name('another.page');
		});
	#endregion