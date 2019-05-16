<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    protected $table = 'my_announcement';

    const  CREATE_AT = 'ment_time';
    
    protected $primaryKey = 'ment_id';

    // public $timestamps = false;//是否手动维护时间字段
    
    protected $dateFormat = 'U';
    
    protected $fillable = [
        'ment_title', 'ment_content', 'ment_flag','ment_time'
    ];

    protected $hidden = ['ment_flag'];
}
