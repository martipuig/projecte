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

class categoriaDetallController extends AppBaseController {

	private $articleRepository;
    private $categoriaRepository;

	public function __construct(articleRepository $articleRepo, categoriaRepository $categoriaRepo, categoriaEspRepository $categoriaEspRepo)
    {
        $this->articleRepository = $articleRepo;
        $this->categoriaRepository = $categoriaRepo;
        $this->categoriaEspRepository = $categoriaEspRepo;
    }

    public function index(Request $request, $id)
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
       return view('categoriaDetall')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }

    public function show(Request $request, $id)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = \App\Models\article::where('mostrar', 'Sí')->paginate(6);

        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

        $article = $this->articleRepository->findWithoutFail($id);

            // foreach($article->imatges as $a){
            //     var_dump($a->name);
            //     echo "<br>";
            // }
        
        return view('categoriaDetall')->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps)->with('id', $id);
    }

    public function categoriaCompleta($idcategoria)
    {
        $articles = \App\Models\article::where('mostrar', 'Sí')->where('categoria_id', $idcategoria)->paginate(6);

        $categorias = $this->categoriaRepository->all();

        $categoriaEsps = $this->categoriaEspRepository->all();

        $categoria = \App\Models\categoria::where('id', $idcategoria)->first();

        // foreach($articles as $article){
        //     echo $article->NomArt . "<br>";
        //     foreach($article->imatges as $a){
        //         var_dump($a->name);
        //         echo "<br>";
        //     }
        // }
       return view('categoriaCompletaDetall')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps)->with('categoria', $categoria);
    }

}