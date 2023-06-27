<?php

namespace App\Http\Controllers;

use App\Api\Filmes;
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

    /**
     * Controller para a home dos filmes, que exibirá a lista
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     **/
    public function homeFilmes()
    {
        $filmes = (new Filmes())->listAllFilmes();
        $bpage = intval($filmes->next) - 1;
        $bpage = strval($bpage <= 0 ? 1 : $bpage);
        $npage = ltrim($filmes->next, '/titles?page=');
        return view('filmes.index',compact('filmes','bpage','npage'));
    }

    /**
     * Controller para a paginacao dos filmes, que exibirá na lista
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     **/
    public function pageFilmes($page, $is_back = null)
    {
        $filmes = (new Filmes())->anotherPage($page, $is_back);
        $bpage = intval($filmes->next) - 1;
        $bpage = $bpage <= 0 ? 1 : $bpage;
        $npage = ltrim($filmes->next, '/titles?page=');
        return view('filmes.index',compact('filmes','bpage','npage'));
    }
}
