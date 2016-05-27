<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Predstava extends Model
{
    protected $table="predstava";
    protected $primaryKey="IDPre";

    public function relatedPozoriste()
    {
      
    }

}
