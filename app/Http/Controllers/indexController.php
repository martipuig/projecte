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

    //redirecciona a la vista index amb les categories, categories específiques i 
    //els articles 
    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = \App\Models\article::where('mostrar', 'Sí')->paginate(8);

        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

       return view('index')
            ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }

    // retorn en format json els articles que tenen el valor Sí al camp mostrar i que contenen la cadena de caràcters passada per get
    // al nom de l'article o la descripció 
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
    }

    //redirecciona a la vista resultats amb les categories, categories específiques i 
    //els articles que tenen el valor Sí al camp mostrar i que contenen la cadena de caràcters passada per get
    //al nom de l'article o la descripció 
    public function resultats($buscar)
    {
        $articles = \App\Models\article::where('mostrar', 'Sí')
        ->where(function($query) use($buscar) {
            $query->where('NomArt', 'LIKE', '%' . $buscar . '%')
            ->orWhere('descripcio', 'LIKE', '%' . $buscar . '%');
        })
        ->paginate(6);

        $categorias = $this->categoriaRepository->all();

        $categoriaEsps = $this->categoriaEspRepository->all();

        return view('resultats')
                ->with('articles', $articles)->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps)->with('buscar', $buscar);
    }

}