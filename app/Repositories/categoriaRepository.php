<?php

namespace App\Repositories;

use App\Models\categoria;
use InfyOm\Generator\Common\BaseRepository;

class categoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomCat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categoria::class;
    }
}
