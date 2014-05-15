<?php

class HomeController extends BaseController {

	protected $layout = 'base';

	public function index()
	{
		$data = array(
			'body' => 'This is awesome, from the HomeController'
		);
		
		$this->layout->content = View::make('home', $data);
	}
}