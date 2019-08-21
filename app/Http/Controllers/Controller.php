<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    protected $data = [
        'success' => false,
        'message' => 'Error Response',
        'response' => 400,
        'data' => []
    ];
}
