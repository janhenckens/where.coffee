<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()) {
			$location = new Location();
			$location->latitude = Input::get('latitude');
			$location->longitude = Input::get('longitude');
			$location->request_type = camel_case('search');
			/** Make file output JSON **/
			header('Content-Type: application/json');
			/** Receive long and lat through ajax **/
			$query = urlencode(Input::get('location'));
			/** CURL to Foursquare to get the data based on the above mentioned $location **/
			$url = "https://api.foursquare.com/v2/venues/explore?near=" . $query . "&client_id=R1RAIUEMOV013YRFZQWIPLV404ELYNWBM4ILDDYAIQUUYLLK&client_secret=KN5PYBT3QWCXK5SY3X0IHQZTWIMNBVIUV3RZ53NKFENUX41U&v=20130815&query=coffee";
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
		}	}


}
