<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller {

    public function store() {
        $input = Request::all();
        dd($input);
    }
}
