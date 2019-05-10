<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected  $table = 'text_image';
    protected  $primaryKey = 'id';

    protected  $fillable = ['image_load','title','author'];

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }
}
