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
use App\categoriaEspController;

use App\Picture;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Image;
use DB;

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

    //redirecciona a la vista articles.index amb els articles
    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->all();
       return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new article.
     *
     * @return Response
     */

    //redirecciona a la vista articles.create amb les categories, categories específiques,
    //els estats que pot estar l'article i les opcions que es poden seleccionar al camp mostrar
    public function create()
    {
        $categories=\App\Models\categoria::lists('NomCat', 'id');
        $categoriesEsp=\App\Models\categoriaEsp::lists('NomEsp', 'id');
        $estats=array("No venut"=>"No venut", "Venut"=>"Venut", "Reservat"=>"Reservat");
        $mostrar=array("Sí"=>"Sí", "No"=>"No");
        return view('articles.create')->with('categories', $categories)->with('categoriesEsp', $categoriesEsp)->with('estats', $estats)->with('mostrar', $mostrar);
    }

    /**
     * Store a newly created article in storage.
     *
     * @param CreatearticleRequest $request
     *
     * @return Response
     */

    //guarda l'article creat a la bbdd, si s'han afegit imatges les guarda a la taula pictures, juntament amb una imatge de menys resolució
    //i les associa amb l'article, redirecciona a la vista articles.index
    public function store(CreatearticleRequest $request)
    {
        $input = $request->all();
        //var_dump($request["imatge"]);

        $article = $this->articleRepository->create($input);
        $idArticle = $article->id;

        if(isset($input["imatge"]) && $input["imatge"][0]!=null){
            foreach($input["imatge"] as $imatge){
                $img = Image::make($imatge);
                $img2 = Image::make($imatge);
                $img2->resize(250, null, function ($constraint) {
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

        Flash::success('Article guardat correctament.');

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
            Flash::error('No s\'ha trobat cap article');

            return redirect(route('articles.index'));
        }
        
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  int $id
     *
     * @return Response
     */

    //redirecciona a la vista articles.edit amb l'article que s'ha d'editar, les categories, categories específiques,
    //els estats que pot estar l'article i les opcions que es poden seleccionar al camp mostrar
    public function edit($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);
        $categories=\App\Models\categoria::lists('NomCat', 'id');
        $categoriesEsp=\App\Models\categoriaEsp::where('categoria_id', $article->categoria_id)->lists('NomEsp', 'id');
        $estats=array("No venut"=>"No venut", "Venut"=>"Venut", "Reservat"=>"Reservat");
        $mostrar=array("Sí"=>"Sí", "No"=>"No");

        if (empty($article)) {
            Flash::error('No s\'ha trobat cap article');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('article', $article)->with('categories', $categories)->with('categoriesEsp', $categoriesEsp)->with('estats', $estats)->with('mostrar', $mostrar);
    }

    /**
     * Update the specified article in storage.
     *
     * @param  int              $id
     * @param UpdatearticleRequest $request
     *
     * @return Response
     */

    //actualitza les dades de l'article, si s'han eliminat imatges les borra de la taula pictures i si s'afegeixen imatges les afegeix a la taula pictures
    public function update($id, UpdatearticleRequest $request)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('No s\'ha trobat cap article');

            return redirect(route('articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);



        $input=$request->all();
        if(isset($input["idFotosEliminar"])) {
            foreach($input["idFotosEliminar"] as $idImatge) {
                $imatge=\App\Picture::find($idImatge);
                $imatge->delete();
            }
        }

        $idArticle = $article->id;
        if(isset($input["imatge"]) && $input["imatge"][0]!=null){
            foreach($input["imatge"] as $imatge){
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

        Flash::success('Article actualitzat correctament.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    //elimina l'article, si l'article tenia imatges les borra de la taula pictures
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('No s\'ha trobat cap article');

            return redirect(route('articles.index'));
        }

        foreach($article->imatges as $imatge) {
            $imatge->delete();
        }

        $this->articleRepository->delete($id);


        Flash::success('Article eliminat correctament.');

        return redirect(route('articles.index'));
    }

    //retorna en format ajax les categories específiques que pertanyen a la categoria amb l'id que s'ha passat com a paràmetre get
    public function ajax($cat_id){
        $categoriesEsp = \App\Models\categoriaEsp::where('categoria_id', $cat_id)->lists('NomEsp', 'id');
        return Response::json($categoriesEsp);
    }

    //elimina els article, els articles tenien imatges les borra de la taula pictures
    public function multidestroy(request $request){
        $input=$request->all();
        var_dump($input["ArticleBorrar"]);

        if(isset($input["ArticleBorrar"])) {
            foreach($input["ArticleBorrar"] as $idArticle) {
                $article = $this->articleRepository->findWithoutFail($idArticle);
                foreach($article->imatges as $imatge) {
                    $imatge->delete();
                }
                $this->articleRepository->delete($idArticle);
            }
        }

        Flash::success('Articles eliminats correctament.');

        return redirect(route('articles.index'));
    }
}
