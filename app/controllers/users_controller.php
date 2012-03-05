<?php

	class UsersController extends AppController {
	    var $components = array('Auth');

	    function beforeFilter() {
	
			parent::beforeFilter();
			/*
			$this->Auth->fields = array(
	            'username' => 'username', 
	            'password' => 'secretword'
	            );
	        */
			$this->Auth->allow('add');
	    }
	
		public function add() {
			if (!empty($this->data)) { 
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('User created!');
					$this->redirect(array('action'=>'login'));
				} else {
					$this->Session->setFlash('Please correct the login credentials.');
				}
			}
		}			
	
		public function login() {
			
		}
	
		public function logout() {
			$this->redirect($this->Auth->logout());
		}
		
	}
	
?>