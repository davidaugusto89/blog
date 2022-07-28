<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getView($view)
    {
        if (request()->segment(1) == 'amp') {
            if (view()->exists($view . '-amp')) {
                $view .= '-amp';
            } else {
                abort(404);
            }
        }
        return $view;
    }
}
