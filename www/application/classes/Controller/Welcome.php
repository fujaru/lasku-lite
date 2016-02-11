<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->auth();
		$this->response->body('hello, world!');
	}
	
	public function action_invoice()
	{
		echo AppConfig::get_item('currency');
		$view = View::factory('invoice');
		$this->response->body($view);
	}

} // End Welcome
