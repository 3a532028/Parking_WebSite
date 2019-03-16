<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lp extends Model
{
    //
    protected $table='lps';

    protected $fillable=['LP','enter_t','out_t','is_white','status'];


}
