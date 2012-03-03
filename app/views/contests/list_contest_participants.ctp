<div class="header_title">
	<h2>Contest</h2>
	<?php 
		echo $html->link('<< List of Contest', 
						array('action'=>'index') , 
						array('class'=>'newbutton') 
						);
						
		echo $html->link('Add Participant', 
						array('action'=>'add_contest_participants', $contest['Contest']['contest_id']),
						array('class'=>'newbutton') 
						);
	?>
</div>
<?php
	require('contest_info.php'); 
?>
<br>
<fieldset>
	<legend>List of Participants</legend>
	<?php if(empty($contest_participants)): ?>
		<h3>No participants for this contest.</h3>
	<?php else: ?>
		<table class="datalist">
			<tr>
				<th>Name</th>
				<th>Entered On</th>
				<th>Actions</th>
			</tr>
			<?php 
			
				foreach ($contest_participants as $participant): 
				
			?>
				<tr>
					<td>
						<?php echo $participant['participant_name']; ?>
					</td>
					<td>
						<?php
						
							$entry_date = $participant['ContestsParticipants']['entry_date'];
							
							if ( !empty($entry_date) ) {
								echo date( 'F j, Y' , strtotime($entry_date) );
							} else {
								echo "N/A";
							}
						?>
					</td>
					<td class="actionset">
						<?php 
							$contest_id = $contest['Contest']['contest_id'];
							$participant_id = $participant['ContestsParticipants']['participant_id'];
							echo $html->link('Delete', array('action'=>'delete_contest_participant', $contest_id , $participant_id ) ); 
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</fieldset>
