<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Repositories\articleRepository;

class indexController extends AppBaseController {

	private $articleRepository;
	
	public function __construct(articleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->paginate(6);
        // foreach($articles as $article){
        //     foreach($article->imatges as $a){
        //         var_dump($a->name);
        //         echo "<br>";
        //     }
        // }
       return view('index')
            ->with('articles', $articles);
    }

}