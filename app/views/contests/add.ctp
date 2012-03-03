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
	<legend>Please enter the detail(s)</legend> 
	<?php
		echo $form->input('contest_name' , array('label'=>'Name') ); 
		echo $form->input('contest_description',  array('label'=>'Description'));
		echo $form->input('contest_created_on',  array('label'=>'Date Created'));
	?> 
</fieldset>
<?php echo $form->end('Add Contest');?>