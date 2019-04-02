<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lps_info extends Model
{
    //
    protected $table='lps_info';

    protected $fillable=['id','name','mail','lp','phone','extension'];
}
