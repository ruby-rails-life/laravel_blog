<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'my_plants';

    //protected $primaryKey = 'my_id';

    //public $timestamps = false;

    //protected $dateFormat = 'U';

    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

    //protected $connection = 'connection-name';

    public function posts(){
        return $this->belongsToMany('post');
    }

}
