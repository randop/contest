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
			//$this->Auth->allow('add','login','logout');
			
			$this->Auth->allow('*');
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
			if ($this->Session->read('Auth.User')) {
			       $this->redirect('/', null, false);
		    }
		}
	
		public function logout() {
			$this->redirect($this->Auth->logout());
		}
		
	}
	
?>