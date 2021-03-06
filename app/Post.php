<?php

namespace App;

use App\Scopes\TitleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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

    /**
     * モデルの「初期起動」メソッド
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TitleScope);

        //クロージャによるグローバルスコープ
        static::addGlobalScope('title', function (Builder $builder) {
            $builder->where('title', '=', 'sunny');
        });
    }

    public function plants(){
        return $this->belongsToMany('plant');
    }
}
