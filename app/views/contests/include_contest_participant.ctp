<div class="header_title">
	<h2>Contest</h2>
	<?php 

		$contest_id = $contest['Contest']['contest_id'];

		echo $html->link('<< List of Contest Participants', 
							array('action'=>'add_contest_participants' , $contest_id ),
							array('class'=>'newbutton')
						); 
	?>
</div>
<?php
	require('contest_info.php'); 
?>
<br>
<?php 

	$participant_id = $participant['Participant']['participant_id'];

	echo $form->create( 
						false,
						array('url' => array('action' => 'include_contest_participant' , 'commit' , $contest_id , $participant_id )) 
						);

?>
<table width="100%" border="0" >
	<tr>
		<td colspan="4">Participant</td>
	</tr>
	<tr>
		<td>Name</td>
		<td>
			<h4><?php echo $participant['Participant']['participant_name']; ?></h4>
		</td>
	</tr>
	<tr>
		<td>Entry Date</td>
		<td>
			<?php echo $form->input( 'entry_date' , array('label'=>'', 'type'=>'date')); ?>
		</td>
	</tr>
</table>
<br>
<?php echo $form->end('Add');?>