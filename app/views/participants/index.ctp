<div class="header_title">
	<h2>Participants</h2>
	<?php echo $this->Html->script('test',FALSE); ?>
	<?php echo $this->Html->link('Create New', array('action'=>'add') , array('class'=>'newbutton') ); ?>
</div>

<?php if(empty($participants)): ?>
	<h3>No list of Participants.</h3>
<?php else: ?>
	<table class="datalist">
		<tr>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($participants as $participant): ?>
			<tr>
				<td>
					<?php echo $participant['Participant']['participant_name']; ?>
				</td>
				<td class="actionset">
					<?php echo $html->link('Edit', array('action'=>'edit', $participant['Participant']['participant_id']) ); ?>
					<?php echo $html->link('Delete', array('action'=>'delete', $participant['Participant']['participant_id']) ); ?> 
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>
