<?php

	class Contest extends AppModel{
		var $name = 'Contest';
		var $primaryKey = 'contest_id';
		
		var $order = "Contest.contest_created_on DESC";
		
		var $_schema = array(
			'contest_name' => array(
				'type' => 'string', 
				'length' => 255
			),
			'contest_description' => array('type' => 'text'),
			'contest_created_on' => array('type' => 'date')
		);
		
		var $validate = array(
			'contest_name' => array( 'rule' => 'notEmpty', 'message' => 'Please provide the contest name.' )
			);
			
		var $hasAndBelongsToMany = array(
									'Participant' =>
							            array(
											'with' => 'ContestsParticipants',
							                'className' => 'Participant',
							                'joinTable' => 'contests_participants',
							                'foreignKey' => 'contest_id',
							                'associationForeignKey' => 'participant_id',
							                'unique' => false
							            )
		);
		
	}

?>