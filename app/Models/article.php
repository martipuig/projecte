<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="article",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="NomArt",
 *          description="NomArt",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="categoria_id",
 *          description="categoria_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="categoria_esps_id",
 *          description="categoria_esps_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descripcio",
 *          description="descripcio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="unitat",
 *          description="unitat",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="amplada",
 *          description="amplada",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="llargada",
 *          description="llargada",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="alcada",
 *          description="alcada",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="preu",
 *          description="preu",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="estat",
 *          description="estat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="notes",
 *          description="notes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="usuariMod",
 *          description="usuariMod",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="posicio",
 *          description="posicio",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class article extends Model
{
    use SoftDeletes;

    public $table = 'articles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'NomArt' => 'string',
        'categoria_id' => 'integer',
        'categoria_esps_id' => 'integer',
        'descripcio' => 'string',
        'unitat' => 'integer',
        'amplada' => 'integer',
        'llargada' => 'integer',
        'alcada' => 'integer',
        'preu' => 'integer',
        'estat' => 'string',
        'notes' => 'string',
        'usuariMod' => 'string',
        'posicio' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Models\categoria');
    }

    public function categoriaEsp()
    {
        return $this->belongsTo('App\Models\categoriaEsp', 'categoria_esps_id');
    }
}
