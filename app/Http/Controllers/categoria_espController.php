<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createcategoria_espRequest;
use App\Http\Requests\Updatecategoria_espRequest;
use App\Repositories\categoria_espRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class categoria_espController extends AppBaseController
{
    /** @var  categoria_espRepository */
    private $categoriaEspRepository;

    public function __construct(categoria_espRepository $categoriaEspRepo)
    {
        $this->categoriaEspRepository = $categoriaEspRepo;
    }

    /**
     * Display a listing of the categoria_esp.
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
     * Show the form for creating a new categoria_esp.
     *
     * @return Response
     */
    public function create()
    {
        return view('categoriaEsps.create');
    }

    /**
     * Store a newly created categoria_esp in storage.
     *
     * @param Createcategoria_espRequest $request
     *
     * @return Response
     */
    public function store(Createcategoria_espRequest $request)
    {
        $input = $request->all();

        $categoriaEsp = $this->categoriaEspRepository->create($input);

        Flash::success('La categoria específica s\'ha guardat correctament');

        return redirect(route('categoriaEsps.index'));
    }

    /**
     * Display the specified categoria_esp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('No s\'ha trobat cap categoria específica');

            return redirect(route('categoriaEsps.index'));
        }

        return view('categoriaEsps.show')->with('categoriaEsp', $categoriaEsp);
    }

    /**
     * Show the form for editing the specified categoria_esp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('No s\'ha trobat cap categoria específica');

            return redirect(route('categoriaEsps.index'));
        }

        return view('categoriaEsps.edit')->with('categoriaEsp', $categoriaEsp);
    }

    /**
     * Update the specified categoria_esp in storage.
     *
     * @param  int              $id
     * @param Updatecategoria_espRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecategoria_espRequest $request)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('No s\'ha trobat cap categoria específica');

            return redirect(route('categoriaEsps.index'));
        }

        $categoriaEsp = $this->categoriaEspRepository->update($request->all(), $id);

        Flash::success('S\'ha actualitzat la categoria específica correctament');

        return redirect(route('categoriaEsps.index'));
    }

    /**
     * Remove the specified categoria_esp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaEsp = $this->categoriaEspRepository->findWithoutFail($id);

        if (empty($categoriaEsp)) {
            Flash::error('No s\'ha trobat cap categoria específica');

            return redirect(route('categoriaEsps.index'));
        }

        $this->categoriaEspRepository->delete($id);

        Flash::success('La categoria específica s\'ha borrat correctament');

        return redirect(route('categoriaEsps.index'));
    }
}
