<?php

class HomeController extends BaseController {

	protected $layout = 'base';

	public function index()
	{
		$data = array(
			'heading' => 'Hello Laravel (from Home)',
			'body' => 'This is awesome, from the HomeController'
		);
		
		$this->layout->content = View::make('current_location', $data);
	}
}