<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];

    /**
     * 複数代入しない属性
     *
     * @var array
     */
    //protected $guarded = ['title'];
    //protected $guarded = [];
}
