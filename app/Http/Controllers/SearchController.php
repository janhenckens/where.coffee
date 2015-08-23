<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Search;

class SearchController extends Controller {

    public function __construct(FoursquareController $foursquare) {
        $this->foursquare = $foursquare;
    }
    public function store() {
        $input = Request::all();
        Search::create(['searchquery' => $input['searchlocation' ], 'request_type' => $input['request_type']]);
        $result = $this->foursquare->searchCity($input['searchlocation']);
        return $result;
    }
}
