<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="categoriaEsp",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="NomEsp",
 *          description="NomEsp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="categoria_id",
 *          description="categoria_id",
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
class categoriaEsp extends Model
{
    use SoftDeletes;

    public $table = 'categoria_esps';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'NomEsp',
        'categoria_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'NomEsp' => 'string',
        'categoria_id' => 'integer'
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
}
