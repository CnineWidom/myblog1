<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'my_comment';

    protected $fillable = ['com_userId','com_inforId','com_content','com_parentId','com_flag'];
}
