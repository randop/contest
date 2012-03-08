<?php
	class AppController extends Controller {
		
		var $helpers = array('Js','Html','Session');
		
		public $components = array( 
						'Auth' => array('authorize' => 'controller'),
						'Session' 
						);

		public function isAuthorized() {
			return false;
		}
		
		public function beforeFilter() {
			
		    $this->Auth->loginError = "You have provided invalid username or password. Please try again.";
		    $this->Auth->authError = "Please login to continue.";
			
			$this->Auth->allow(array('display','index'));
			
			$user = $this->Auth->user();
			if (!empty($user)) {
				Configure::write('User', $user[$this->Auth->getModel()->alias]);
			}
		}
		
		public function beforeRender() {
			$user = $this->Auth->user(); 
			if (!empty($user)) {
				$user = $user[$this->Auth->getModel()->alias]; 
				$this->set(compact('user'));
			}
		}
		
	}
?>