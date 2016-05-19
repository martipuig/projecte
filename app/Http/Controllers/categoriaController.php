<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;
use App\Repositories\categoriaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class categoriaController extends AppBaseController
{
    /** @var  categoriaRepository */
    private $categoriaRepository;

    public function __construct(categoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the categoria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriaRepository->all();

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new categoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created categoria in storage.
     *
     * @param CreatecategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('La categoria s\'ha guardat correctament');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified categoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('No s\'ha trobat cap categoria');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified categoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('No s\'ha trobat cap categoria');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified categoria in storage.
     *
     * @param  int              $id
     * @param UpdatecategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('No s\'ha trobat cap categoria');

            return redirect(route('categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('La categoria s\'ha actualitzat correctament.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified categoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('No s\'ha trobat cap categoria');

            return redirect(route('categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('La categoria s\'ha borrat correctament');

        return redirect(route('categorias.index'));
    }
}
