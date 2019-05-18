<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MyComment extends Model
{
    protected $table = 'my_comment';

    protected $fillable = ['com_userId','com_inforId','com_content','com_parentId','com_flag','created_at','updated_at'];

    protected $primaryKey = 'com_id';

    protected $dateFormat = 'U';

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }

    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['updated_at']) : '';
    }

    public function users()
    {
    	return $this->belongsTo('App\User','com_userId','id');
    }

    public function information()
    {
    	return $this->belongsTo('App\Model\Information','com_inforId','in_id');
    }
}
