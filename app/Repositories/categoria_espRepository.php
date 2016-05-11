<?php

namespace App\Repositories;

use App\Models\categoria_esp;
use InfyOm\Generator\Common\BaseRepository;

class categoria_espRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomEsp',
        'cat_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categoria_esp::class;
    }
}
