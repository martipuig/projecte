<?php

namespace App\Repositories;

use App\Models\categoriaEsp;
use InfyOm\Generator\Common\BaseRepository;

class categoriaEspRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomEsp',
        'categoria_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categoriaEsp::class;
    }
}
