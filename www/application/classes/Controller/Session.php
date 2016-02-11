<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Session extends Controller {
	
	const ERROR_INVALID_LOGIN = 'Invalid username/password';
	
	/**
	 * Dashboard
	 */
	public function action_index() {
		if(!Session::instance()->get('user_login'))
			$this->redirect('session/login');
			
		$view = View::factory('session/index');
		$this->response->body($view);
	}
	
	/**
	 * Validate login
	 */
	protected function authenticate($user, $pass) {
		$query = DB::query(Database::SELECT, "
			SELECT * FROM `user` 
			WHERE `username` = :user 
				AND `password` = MD5(:pass)
		");
		$query->param(':user', $user);
		$query->param(':pass', $pass);
		$rs = $query->execute();
		
		if(count($rs) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	/**
	 * Update username & password
	 */
	protected function update_password($user, $pass) {
		return true;
	}
	
	/**
	 * Login form to admin session
	 */
	public function action_login()
	{
		$view = View::factory('session/login');
		switch($this->request->method()) {
			case 'GET':
			default:
				$view->set('post', $this->request->post());
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				$validation = Validation::factory($post);
				$validation
					->rule('user', 'not_empty')
					->rule('pass', 'not_empty');
					
				if(!$validation->check()) {
					$view->set('post', $post);
					$view->set('errors', $validation->errors('session'));
					$this->response->body($view);
					return;
				}
				
				if(!$this->authenticate($post['user'], $post['pass'])) {
					$view->set('post', $post);
					$view->set('errors', self::ERROR_INVALID_LOGIN);
					$this->response->body($view);
					return;
				}
				
				$session = Session::instance();
				$session->set('user_login', TRUE);
				
				$this->redirect('session');
				break;
				
		}
	}
	
	/**
	 * Logout from session
	 */
	public function action_logout() {
		$session = Session::instance();
		$session->delete('user_login');
		$this->redirect('session');
	}
	
	/**
	 * Change password
	 */
	public function action_change_password() {
		$view = View::factory('session/change_password');
		switch($this->request->method()) {
			case 'GET':
			default:
				$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : URL::site('session');
				$view->set('post', $this->request->post());
				$view->set('referer', $referer);
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				$referer = $post['referer'];
				$has_error = FALSE;
				$errors = array();
				
				// Validate inputs
				$validation = Validation::factory($post);
				$validation
					->rule('user', 'not_empty')
					->rule('pass', 'not_empty')
					->rule('new_pass1', 'not_empty')
					->rule('new_pass2', 'matches', array(':validation', 'new_pass2', 'new_pass1'));
					
				if(!$validation->check()) {
					$errors = array_merge($errors, $validation->errors('session'));
					$has_error = TRUE;
				}
				
				if(!$this->authenticate($post['user'], $post['pass'])) {
					$errors['invalid'] = self::ERROR_INVALID_LOGIN;
					$has_error = TRUE;
				}
				
				// On error, rerender the page
				if($has_error) {
					$view->set('post', $post);
					$view->set('referer', $referer);
					$view->set('errors', $errors);
					$this->response->body($view);
					return;
				}
				
				// Update password
				$this->update_password($post['user'], $post['new_pass1']);
				
				// Flash & redirect
				$flash = View::factory('admin/flash');
				$flash->set('message', "Your password has been updated.");
				$flash->set('location', $referer);
				$this->response->body($flash);
				break;
		}
	}

}
