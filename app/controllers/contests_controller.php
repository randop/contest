<?php
	
	class ContestsController extends AppController {
		
		var $name = 'Contests';
		
		var $uses = array('Contest', 'Participant');
		
		var $helpers = array('Html', 'Form');
		
		function index() {
			
			$this->set('contests',$this->Contest->find('all'));
			
		}
		
		function add() {
			
			if (!empty($this->data)) {
				$this->Contest->create(); 
				if ( $this->Contest->save($this->data) ) {
					$this->Session->setFlash('The contest was successfully recorded.');
					$this->redirect(array('action'=>'index'), null, true); 
				}
				else {
					$this->Session->setFlash('Unable to record the contest. Please try again.');
				}
			}
			
		}
		
		function edit( $id = null ) {
			
			if (!$id) {
				$this->redirect(array('action'=>'index'), null, true);
			}
			
			if (empty($this->data)) {
				
				$this->data = $this->Contest->find(array('contest_id' => $id));
				
			} else {
				
				if ($this->Contest->save($this->data)) {
					$this->Session->setFlash('You have successfully updated the record.');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
					$this->Session->setFlash('Unable to record the contest. Please try again.');
				}
				
			}
			
		}
		
		function delete( $id = null ) {
			
			if (!$id) {
				$this->redirect(array('action'=>'index'), null, true);
			}
			 
			if ($this->Contest->delete($id)) {
				$this->Session->setFlash("You have successfully deleted the record."); 
				$this->redirect(array('action'=>'index'), null, true);
			}
			
		}
		
		function list_contest_participants( $id = null ) {
			
			if (!$id) {
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				
				$the_contest = $this->Contest->find(array('contest_id' => $id));
				
				$this->set( 'contest' , $the_contest );
				
				$this->set( 'contest_participants' , $the_contest['Participant'] );
				
				
			}
			
		}
		
		function add_contest_participants( $contest_id = null ) {
			
			if ( empty($contest_id) ) {
				
				$this->redirect(array('action'=>'index'), null, true);
				
			} else {
				
				$the_contest = $this->Contest->find( array('contest_id' => $contest_id) );
				
				$this->set( 'contest' , $the_contest );
				
				$all_participants = $this->Participant->find('all');
				
				$this->set( 'all_participants' , $all_participants );
				
			}
			
		}
		
		function include_contest_participant( $event = null , $contest_id = null, $participant_id = null ) {
			
			if ( empty($contest_id) || empty($participant_id) ) {
				$this->redirect(array('action'=>'index'), null, true);	
			}
			
			if ( !empty($event) && $event=='confirm' ) {
			
				$the_contest = $this->Contest->find( array('contest_id' => $contest_id) );
			
				$this->set( 'contest' , $the_contest );
			
				$the_participant = $this->Participant->find( array('participant_id' => $participant_id) );
			
				$this->set( 'participant' , $the_participant );
			
				
			} elseif ( !empty($event) && $event=='commit' ) {
				
				$this->Contest->ContestsParticipants->create();
				
				$entry_date = "{$this->data['entry_date']['year']}-{$this->data['entry_date']['month']}-{$this->data['entry_date']['day']}";
				
				$params = array(
								'contest_id'=>$contest_id , 
								'participant_id' => $participant_id,
								'entry_date'=>$entry_date
								);
				$res = $this->Contest->ContestsParticipants->save( $params );
				
				$the_participant = $this->Participant->find( array('participant_id' => $participant_id) );
				$participant_name = $the_participant['Participant']['participant_name'];

				if ( $res )
				{
					$this->Session->setFlash("You have added {$participant_name} as participant of this contest.");
				}
				else
				{
					$this->Session->setFlash("Oops! {$participant_name} is already a participant of this contest.");
				}

				$this->redirect(array('action'=>'add_contest_participants' , $contest_id ), null, true);	
				
			} else {
				
				$this->redirect(array('action'=>'index'), null, true);
				
			}
		}
		
		function delete_contest_participant( $contest_id = null, $participant_id = null) {
			
			if ( !empty($contest_id) && !empty($participant_id) ) {
				
				$the_participant = $this->Participant->find( array('participant_id' => $participant_id) );
				$participant_name = $the_participant['Participant']['participant_name'];
				
				$params = array(
								'contest_id'=>$contest_id , 
								'participant_id' => $participant_id
								);
								
				$this->Contest->ContestsParticipants->deleteAll($params) ;
				
				$this->Session->setFlash("You have deleted {$participant_name} as participant of this contest.");
				
				$this->redirect( array('action'=>'list_contest_participants' , $contest_id ) , null, true);	
				
				
			} else {
				$this->redirect(array('action'=>'index'), null, true);
			}
			
		}
		
		
	}
	
?>