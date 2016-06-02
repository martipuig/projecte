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
use Illuminate\Support\Facades\Input;

class preferitsController extends AppBaseController {

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
       return view('preferits')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }
}