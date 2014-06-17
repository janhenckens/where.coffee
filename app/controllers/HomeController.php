<?php

class HomeController extends BaseController {

	protected $layout = 'base';

	public function index()
	{	
		$this->layout->content = View::make('home');
	}
}