<?php
	echo $this->Form->create();
	
	echo $this->Form->inputs(
			array('legend' => 'User Signup', 'username', 'password')
			);
	
	echo $this->Form->end('Sign Up');
?>