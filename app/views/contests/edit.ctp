<div class="header_title">
	<h2>Contest</h2>
	<?php 

	echo $html->link('<< List of Contests', 
						array('action'=>'index'),
						array('class'=>'newbutton')
					); 
	?>
</div>
<?php echo $form->create('Contest');?>
<fieldset>
	<legend>Edit Contest Details</legend>
	<?php 
		echo $form->hidden('contest_id'); 
		echo $form->input('contest_name' , array('label'=>'Name') ); 
		echo $form->input('contest_description',  array('label'=>'Description'));
		echo $form->input('contest_created_on',  array('label'=>'Date Created'));
	?>
</fieldset>
<?php echo $form->end('Save'); ?>