<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Repositories\articleRepository;
use App\Repositories\categoriaRepository;
use App\Repositories\categoriaEspRepository;

class indexController extends AppBaseController {

	private $articleRepository;
    private $categoriaRepository;

	
	public function __construct(articleRepository $articleRepo, categoriaRepository $categoriaRepo, categoriaEspRepository $categoriaEspRepo)
    {
        $this->articleRepository = $articleRepo;
        $this->categoriaRepository = $categoriaRepo;
        $this->categoriaEspRepository = $categoriaEspRepo;
    }

    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        //$articles = $this->articleRepository->paginate(6);
        $articles = \App\Models\article::where('mostrar', 'Sí')->paginate(6);

        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

        // foreach($articles as $article){
        //     foreach($article->imatges as $a){
        //         var_dump($a->name);
        //         echo "<br>";
        //     }
        // }
       return view('index')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }

public function buscador($buscar)
{
    $articles = \App\Models\article::with(['imatges'=>function($query) {
        $query->select(['id', 'name', 'article_id']);
    }])
    ->where('mostrar', 'Sí')
    ->where(function($query) use($buscar) {
        $query->where('NomArt', 'LIKE', '%' . $buscar . '%')
        ->orWhere('descripcio', 'LIKE', '%' . $buscar . '%');
    })
    ->paginate(5);

    return Response::json($articles);
    
    // foreach ($articles as $article) {
    //     echo "<pre>";
    //     var_dump($article);
    //     echo "</pre>";
    //     //echo $article->id . "</br>";
    // }

    //var_dump($articles);
}

public function resultats($buscar)
{
    $articles = \App\Models\article::where('mostrar', 'Sí')
    ->where(function($query) use($buscar) {
        $query->where('NomArt', 'LIKE', '%' . $buscar . '%')
        ->orWhere('descripcio', 'LIKE', '%' . $buscar . '%');
    })
    ->paginate(6);

    //$this->categoriaRepository->pushCriteria(new RequestCriteria($request));
    $categorias = $this->categoriaRepository->all();

    //$this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
    $categoriaEsps = $this->categoriaEspRepository->all();

    // foreach($articles as $article){
    //         foreach($article->imatges as $a){
    //             var_dump($a->name);
    //             echo "<br>";
    //         }
    //     }

    return view('resultats')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps)->with('buscar', $buscar);
}

}