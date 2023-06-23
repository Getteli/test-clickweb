<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Controller para a página principal
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     **/
    public function home()
    {
        $allnews = (new News())->listAll();
        return view('home',compact('allnews'));
    }

    /**
     * Controller que enviará para o model o slug para retornar o post
     *
     * @param String $slug nome unico do post
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openPost(String $slug)
    {
        $news = (new News())->getNewsFromSlug($slug);

        // se nao achar e der erro, exibe pagina 404 de erro
        if (!$news)
        {
            return view('error');
        }

        return view('post', compact('news'));
    }
}
