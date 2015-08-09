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

    public function searchCity($query) {

        $FSQ_CLIENT_ID = $this->env->findEnvironmentVariable('FSQ_CLIENT_ID');
        $FSQ_CLIENT_SECRET = $this->env->findEnvironmentVariable('FSQ_CLIENT_SECRET');
        $FSQ_API = 'https://api.foursquare.com';
        $url = 'v2/venues/explore';

        // Create a client and provide a base URL
        $client = new Client($FSQ_API);
        // Create a request with basic Auth
        $client = $client->get($url);
        $client->getQuery()->set('near', $query);
        $client->getQuery()->set('client_id', $FSQ_CLIENT_ID);
        $client->getQuery()->set('client_secret', $FSQ_CLIENT_SECRET);
        $client->getQuery()->set('v', 20130815);
        $client->getQuery()->set('querry', 'coffee');

        // Send the request and get the response$
        $response = $client->send();
        $data = $response->json();

        // Bail out of get back anything but data
        if($data['meta']['code'] != 200) {
            return 'Looks like something went wrong';
        }
        $result = $this->parseResults($data['response']['groups']['0']['items']);

    }

    public function searchCoordinates($lat, $long) {

    }

    private function parseResults($data) {
    }
}
