<?php defined('SYSPATH') or die('No direct script access.');

class Controller extends Kohana_Controller {
	
	/**
	 * Check authentication
	 */
	public function auth() 
	{
		if(!Session::instance()->get('user_login')) {
			$this->redirect('session/login');
			return false;
		}
		return true;
	}
	
	/**
	 * Send flash message
	 */
	protected function flash($message, $redirect)
	{
		// Flash & redirect
		$flash = View::factory('admin/flash');
		$flash->set('message', $message);
		$flash->set('location', $redirect);
		$this->response->body($flash);
	}
	
}
