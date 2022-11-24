<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Log;

trait LogTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function log( $log_item_id, $action, $url)
    {
        $log= new Log;

        $log->user_id=auth()->user()->id;
        $log->log_item_id=$log_item_id;
        $log->action=$action;
        $log->url=$url;

        $log->save();

    }

}
