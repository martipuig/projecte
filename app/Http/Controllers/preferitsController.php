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


    public function ajaxpreferits($jsonPreferits) {
        $preferits=json_decode($jsonPreferits, true);
        $articles = \App\Models\article::with(['imatges'=>function($query) {
            $query->select(['id', 'name', 'article_id']);
        }])
        ->where('mostrar', 'Sí')->whereIn('id', $preferits)->get();
        return Response::json($articles);
    }

    public function preferits(Request $request)
    {
        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

       return view('preferits')
            ->with('categorias', $categorias)->with('categoriaEsps', $categoriaEsps);
    }

    
}