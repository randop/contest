<div class="header_title">
	<h2>Participant</h2>
	<?php 

	echo $html->link('<< List of Participants', 
						array('action'=>'index'),
						array('class'=>'newbutton')
					); 
	?>
</div>
<?php echo $form->create('Participant');?> 
<fieldset>
	<legend>Please enter the detail(s)</legend>
	<?php
		echo $form->hidden('participant_id'); 
		echo $form->input('participant_name' , array('label'=>'Name') ); 
	?>
</fieldset>
<?php echo $form->end('Save');?>