<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aboutuser extends Model
{
    protected $table = "aboutuser";
    protected $primaryKey = 'ab_id';
    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\User','ab_uid','id');
    }
}
