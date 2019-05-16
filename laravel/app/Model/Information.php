<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'my_information';

    protected $fillable = ['in_title','in_content','in_flag','in_top','in_time'];

    protected $primaryKey = 'in_id';

    const  CREATE_AT = 'in_time';
    
    protected $dateFormat = 'U';

    public function usersBy()
    {
    	return $this->belongsTo('App\User','in_userid','id');
    }

    public function readCode()
    {
    	return $this->hasMany('App\Model\Myreadrecode','re_informationId','in_id');
    }
}
