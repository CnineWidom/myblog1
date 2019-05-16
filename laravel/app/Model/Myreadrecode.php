<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Myreadrecode extends Model
{
    protected $table = 'my_readrecode';

    protected $fillable = ['re_informationId','re_ip','re_time'];

    protected $primaryKey = 're_id';

    const  CREATE_AT = 're_time';
    
    protected $dateFormat = 'U';

    public function getInfomation()
    {
    	$this->belongsTo('App\Model\Information','re_informationId','in_id');
    }
}
