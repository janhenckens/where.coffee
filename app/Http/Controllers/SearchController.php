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

    public function index() {

    }

    public function store() {
        $input = Request::all();
        $data = array(
            'searchquery' => $input['searchlocation' ],
            'request_type' => $input['request_type']
        );

        if($input['request_type'] === 'geo') {
            $data['latitude'] = $input['lat'];
            $data['longitude'] = $input['lng'];
        };

        Search::create($data);
        $result = $this->foursquare->searchCity($input['searchlocation']);
        echo json_encode($result);
    }
}
