<?php

class LocationController extends BaseController {

	protected $layout = 'base';
	public function index()
	{

	}
	public function store()
	{
			$location = new Location();
			$location->latitude = Input::get('latitude');
			$location->longitude = Input::get('longitude');
			$location->request_type = camel_case('geolocation');


			/** Receive long and lat through ajax **/
			$long = Input::get('longitude');
			$lat = Input::get('latitude');
			$query = $lat . "," . $long;
			/** CURL to Foursquare to get the data based on the above mentioned $query **/
			$url = "https://api.foursquare.com/v2/venues/explore?client_id=R1RAIUEMOV013YRFZQWIPLV404ELYNWBM4ILDDYAIQUUYLLK&client_secret=KN5PYBT3QWCXK5SY3X0IHQZTWIMNBVIUV3RZ53NKFENUX41U&v=20130815&ll=" . $query . "&query=coffee";
			$curl = curl_init();
			curl_setopt_array($curl, 
				array(
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => $url
					));
			$result = curl_exec($curl);
			curl_close($curl);
			$location->json = $result;
			$location->save();
			return $result;

	}
}