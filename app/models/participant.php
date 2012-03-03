<?php

	class Participant extends AppModel{
		var $name = 'Participant';
		var $primaryKey = 'participant_id';
		
		var $order = "Participant.participant_name ASC";
		
		var $_schema = array(
			'participant_name' => array(
				'type' => 'string', 
				'length' => 255
			)
		);
		
		var $validate = array(
			'participant_name' => array( 'rule' => 'notEmpty', 'message' => 'Please provide the participant name.' )
			);
	}

?>