<?php
	
	class ParticipantsController extends AppController {
		
		var $name = 'Participants';
		
		var $uses = array('Contest', 'Participant');
		
		var $helpers = array('Html', 'Form');
		
		function index() {
			
			$this->set('participants',$this->Participant->find('all'));
			
		}
		
		function add() {
			
			if (!empty($this->data)) {
				$this->Participant->create(); 
				if ( $this->Participant->save($this->data) ) {
					$this->Session->setFlash('The participant was successfully recorded.');
					$this->redirect(array('action'=>'index'), null, true); 
				}
				else {
					$this->Session->setFlash('Unable to record the participant. Please try again.');
				}
			}
			
		}
		
		function edit( $id = null ) {
			
			if (!$id) {
				$this->redirect(array('action'=>'index'), null, true);
			}
			
			if (empty($this->data)) {
				
				$this->data = $this->Participant->find(array('participant_id' => $id));
				
			} else {
				
				if ($this->Participant->save($this->data)) {
					$this->Session->setFlash('You have successfully updated the record.');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
					$this->Session->setFlash('Unable to record the participant. Please try again.');
				}
				
			}
			
		}
		
		function delete( $id = null ) {
			
			if (!$id) {
				$this->redirect(array('action'=>'index'), null, true);
			}
			 
			if ($this->Participant->delete($id)) {
				$this->Session->setFlash("You have successfully deleted the record."); 
				$this->redirect(array('action'=>'index'), null, true);
			}
			
		}
		
		
	}
	
?>