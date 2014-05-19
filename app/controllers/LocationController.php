<?php

class LocationController extends BaseController {

	protected $layout = 'base';
	public function index()
	{

	}
	public function store()
	{
		if(Request::ajax()) {
			/** Make file output JSON **/
			header('Content-Type: application/json');
			/** Receive long and lat through ajax **/
			$long = Input::get('longitude');
			$lat = Input::get('latitude');
			$location = $lat . "," . $long;
			/** CURL to Foursquare to get the data based on the above mentioned $location **/
			$url = "https://api.foursquare.com/v2/venues/explore?client_id=R1RAIUEMOV013YRFZQWIPLV404ELYNWBM4ILDDYAIQUUYLLK&client_secret=KN5PYBT3QWCXK5SY3X0IHQZTWIMNBVIUV3RZ53NKFENUX41U&v=20130815&ll=" . $location . "&query=coffee";
			$curl = curl_init();
			curl_setopt_array($curl, 
				array(
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => $url
					));
			$result = curl_exec($curl);
			return $result;
			curl_close($curl);
		}
	}
}