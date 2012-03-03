<div class="header_title">
	<h2>Contest</h2>
	<?php 

	$contest_id = $contest['Contest']['contest_id'];

	echo $html->link('<< List of Contest Participants', 
						array('action'=>'list_contest_participants' , $contest_id ),
						array('class'=>'newbutton')
					); 
	?>
</div>
<?php
	require('contest_info.php'); 
?>
<br>
<fieldset>
	<legend>Select the Participant</legend>
	<?php if(empty($all_participants)): ?>
		<h3>No participants on the list.</h3>
	<?php else: ?>
		<table>
			<tr>
				<th>Name</th>
			</tr>
			<?php 
			
				foreach ($all_participants as $participant): 
				
			?>
				<tr>
					<td>
						<?php
							$participant_name = $participant['Participant']['participant_name'];
							$participant_id = $participant['Participant']['participant_id'];
							
							echo $html->link($participant_name, 
										array('action'=>'include_contest_participant', 'confirm' , $contest_id , $participant_id ) 
									); 
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</fieldset>