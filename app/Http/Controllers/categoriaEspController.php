<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecategoriaEspRequest;
use App\Http\Requests\UpdatecategoriaEspRequest;
use App\Repositories\categoriaEspRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class categoriaEspController extends AppBaseController
{
    /** @var  categoriaEspRepository */
    private $categoriaEspRepository;

    public function __construct(categoriaEspRepository $categoriaEspRepo)
    {
        $this->categoriaEspRepository = $categoriaEspRepo;
    }

    /**
     * Display a listing of the categoriaEsp.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoriaEspRepository->pushCriteria(new RequestCriteria($request));
        $categoriaEsps = $this->categoriaEspRepository->all();

        return view('categoriaEsps.index')
            ->with('categoriaEsps', $categoriaEsps);
    }

    /**
     * Show the form for creating a new categoriaEsp.
     *
     * @return Response
     */
    public function create()
    {
        $categories=\App\Models\categoria::lists('NomCat', 'id');
        return view('categoriaEsps.create')->with('categories', $categories);
    }

    /**
     * Store a newly created categoriaEsp in storage.
     *
     * @param CreatecategoriaEspRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriaEspRequest $request)
    {
        $input = $request->all();

        $categoriaEsp = $this->categoriaEspRepository->create($input);

        Flash::success('categoriaEsp saved successfully.');

        return redirect(route('categoriaEsps.index'));
    }

    /**
     * Display the specified categoriaEsp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('categoriaEsp not found');

            return redirect(route('categoriaEsps.index'));
        }

        return view('categoriaEsps.show')->with('categoriaEsp', $categoriaEsp);
    }

    /**
     * Show the form for editing the specified categoriaEsp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);
        $categories=\App\Models\categoria::lists('NomCat', 'id');

        if (empty($categoriaEsp)) {
            Flash::error('categoriaEsp not found');

            return redirect(route('categoriaEsps.index'));
        }
        return view('categoriaEsps.edit')->with('categoriaEsp', $categoriaEsp)->with('categories', $categories);
    }

    /**
     * Update the specified categoriaEsp in storage.
     *
     * @param  int              $id
     * @param UpdatecategoriaEspRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriaEspRequest $request)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('categoriaEsp not found');

            return redirect(route('categoriaEsps.index'));
        }

        $categoriaEsp = $this->categoriaEspRepository->update($request->all(), $id);

        Flash::success('categoriaEsp updated successfully.');

        return redirect(route('categoriaEsps.index'));
    }

    /**
     * Remove the specified categoriaEsp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('categoriaEsp not found');

            return redirect(route('categoriaEsps.index'));
        }

        $this->categoriaEspRepository->delete($id);

        Flash::success('categoriaEsp deleted successfully.');

        return redirect(route('categoriaEsps.index'));
    }
}
