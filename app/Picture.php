<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //

    public function article()
    {
        return $this->belongsTo('App\Models\article');
    }
}
