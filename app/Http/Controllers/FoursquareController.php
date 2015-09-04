<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Guzzle\Http\Client as Client;
use Illuminate\Support\Facades\Config;

class FoursquareController extends Controller {

    protected $FSQ_CLIENT_ID;
    protected $FSQ_CLIENT_SECRET;
    protected $FSQ_API;


    public function __construct(\Dotenv $env) {
        $this->env = $env;

    }

    public function searchCity($query, $request_type) {
        $FSQ_CLIENT_ID = $this->env->findEnvironmentVariable('FSQ_CLIENT_ID');
        $FSQ_CLIENT_SECRET = $this->env->findEnvironmentVariable('FSQ_CLIENT_SECRET');
        $FSQ_API = 'https://api.foursquare.com';
        $url = 'v2/venues/explore';

        // Create a client and provide a base URL
        $client = new Client($FSQ_API);
        // Create a request with basic Auth
        $client = $client->get($url);
        $client->getQuery()->set('client_id', $FSQ_CLIENT_ID);
        $client->getQuery()->set('client_secret', $FSQ_CLIENT_SECRET);
        $client->getQuery()->set('v', 20130815);
        $client->getQuery()->set('query', 'coffee');
        $client->getQuery()->set('limit', '50');
        $client->getQuery()->set('radius', '40000');
        $client->getQuery()->set('sectionn', 'coffee');

        if($request_type === "location") {
            $client->getQuery()->set('near', $query);
        }
        if($request_type === "geo") {
            $client->getQuery()->set('ll', $query);
        }

        // Send the request and get the response$
        $response = $client->send();
        $data = $response->json();

        // Bail out of get back anything but data
        if($data['meta']['code'] != 200) {
            return 'Looks like something went wrong';
        }
        $results = $this->parseResults($data, $query, $request_type);
        return $results;

    }

    public function searchCoordinates($lat, $long) {

    }

    private function parseResults($data, $query, $request_type) {
        $results = array();
        $locations = $data['response']['groups']['0']['items'];
        $results['status'] = $data['meta']['code'];
        if($request_type === "geo") {
            $latlng = explode(',', $query);
            $results['center']['lat'] = $latlng[0];
            $results['center']['lng'] = $latlng[1];
        }
        if($request_type === "location") {
            $results['center']['lat'] = $data['response']['geocode']['center']['lat'];
            $results['center']['lng'] = $data['response']['geocode']['center']['lng'];
        }
        $results['venues'] = array();
        $i = 1;
        foreach($locations as $location) {
            $results['venues'][$i]['id'] = $location['venue']['id'];
            $results['venues'][$i]['name'] = $location['venue']['name'];
            $results['venues'][$i]['lat'] = $location['venue']['location']['lat'];
            $results['venues'][$i]['lng'] = $location['venue']['location']['lng'];

            $i++;
        }

        return $results;

    }
}
