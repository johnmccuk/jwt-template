<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    /**
     *
     * @return void
     */
    public function __construct()
    {
        $this->AuthenticatedUser = (Auth::check()) ? Auth::user() : null;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
