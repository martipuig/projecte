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

class proddetController extends AppBaseController {

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
        $articles = $this->articleRepository->paginate(6);

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

        return view('proddet')->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }

    public function show(Request $request, $id)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->all();

        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('No s\'ha trobat cap article');

            return redirect(route('articles.index'));
        }

            // foreach($article->imatges as $a){
            //     var_dump($a->name);
            //     echo "<br>";
            // }
        
        return view('proddet')->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps)->with('id', $id);
    }
}