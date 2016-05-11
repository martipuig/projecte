<?php

namespace App\Repositories;

use App\Models\article;
use InfyOm\Generator\Common\BaseRepository;

class articleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomArt',
        'categoria_id',
        'categoria_esps_id',
        'descripcio',
        'unitat',
        'amplada',
        'llargada',
        'alcada',
        'preu',
        'estat',
        'notes',
        'usuariMod',
        'posicio'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return article::class;
    }
}
