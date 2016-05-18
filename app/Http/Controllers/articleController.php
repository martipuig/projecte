<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatearticleRequest;
use App\Http\Requests\UpdatearticleRequest;
use App\Repositories\articleRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\categoriaController;

use App\Picture;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Image;

class articleController extends AppBaseController
{
    /** @var  articleRepository */
    private $articleRepository;

    public function __construct(articleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the article.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->all();
        // foreach($articles as $article){
        //     foreach($article->imatges as $a){
        //         var_dump($a->name);
        //         echo "<br>";
        //     }
        // }
       return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new article.
     *
     * @return Response
     */
    public function create()
    {
        $categories=\App\Models\categoria::lists('NomCat', 'id');
        $categoriesEsp=\App\Models\categoriaEsp::lists('NomEsp', 'id');
        $estats=array("No venut"=>"No venut", "Venut"=>"Venut", "Reservat"=>"Reservat");
        return view('articles.create')->with('categories', $categories)->with('categoriesEsp', $categoriesEsp)->with('estats', $estats);
    }

    /**
     * Store a newly created article in storage.
     *
     * @param CreatearticleRequest $request
     *
     * @return Response
     */
    public function store(CreatearticleRequest $request)
    {
        $input = $request->all();
        //var_dump($request["imatge"]);

        $article = $this->articleRepository->create($input);
        $idArticle = $article->id;

        if(isset($input["imatge"]) && $input["imatge"][0]!=null){
            foreach($input["imatge"] as $imatge){
                var_dump($imatge);
                $img = Image::make($imatge);
                $img2 = Image::make($imatge);
                $img2->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                Response::make($img->encode('jpeg'));
                Response::make($img2->encode('jpeg'));
                
                $picture = new Picture;
                $picture->name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $imatge->getClientOriginalName());
                $picture->pic = $img;
                $picture->picResize = $img2;
                $picture->article()->associate($article);
                $picture->save();
            }
        }

        Flash::success('article saved successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('article not found');

            return redirect(route('articles.index'));
        }

            // foreach($article->imatges as $a){
            //     var_dump($a->name);
            //     echo "<br>";
            // }
        
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);
        $categories=\App\Models\categoria::lists('NomCat', 'id');
        $categoriesEsp=\App\Models\categoriaEsp::lists('NomEsp', 'id');
        $estats=array("No venut"=>"No venut", "Venut"=>"Venut", "Reservat"=>"Reservat");

        if (empty($article)) {
            Flash::error('article not found');

            return redirect(route('articles.index'));
        }
        return view('articles.edit')->with('article', $article)->with('categories', $categories)->with('categoriesEsp', $categoriesEsp)->with('estats', $estats);
    }

    /**
     * Update the specified article in storage.
     *
     * @param  int              $id
     * @param UpdatearticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatearticleRequest $request)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('article not found');

            return redirect(route('articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);

        Flash::success('article updated successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('article not found');

            return redirect(route('articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success('S\'ha borrat correctament l\'article');

        return redirect(route('articles.index'));
    }
}
