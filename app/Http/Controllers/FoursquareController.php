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
        $FSQ_API = 'https://api.foursquare.com/v2';
        $url = 'v2/venues/explore';
        $settings = array(
            'near' => $query,
            'client_id' => $FSQ_CLIENT_ID,
            'client_secret' => $FSQ_CLIENT_SECRET,
            'v' => '20130815',
            'query' => 'coffee'
        );

        // Create a client and provide a base URL
        $client = new Client('https://api.foursquare.com/');
        // Create a request with basic Auth
        $client = $client->get($url);
        $client->getQuery()->set('near', $query);
        $client->getQuery()->set('client_id', $FSQ_CLIENT_ID);
        $client->getQuery()->set('client_secret', $FSQ_CLIENT_SECRET);
        $client->getQuery()->set('v', 20130815);
        $client->getQuery()->set('querry', 'coffee');
        // Send the request and get the response$
        $response = $client->send();
        echo $response->getBody();
        echo $response->getHeader('Content-Length');
        exit;
    }

    public function searchCoordinates($lat, $long) {

    }
}
