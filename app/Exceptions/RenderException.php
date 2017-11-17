<?php

namespace App\Exceptions;

use Exception;

class RenderException extends Exception
{
    /**
     * 例外のレポート
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * 例外をＨＴＴＰレスポンスへレンダ
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response('**RenderException**');
    }
}
