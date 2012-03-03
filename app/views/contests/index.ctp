<div class="header_title">
	<h2>Contests</h2>
	<?php echo $html->link('Create New', array('action'=>'add') , array('class'=>'newbutton') ); ?>
</div>
<?php if(empty($contests)): ?>
	<h3>No list of contest.</h3>
<?php else: ?>
	<table class="datalist">
		<tr>
			<th>Name</th>
			<th>Created On</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($contests as $contest): ?>
			<tr>
				<td>
					<?php echo $contest['Contest']['contest_name']; ?>
				</td>
				<td>
					<?php echo date( 'F j, Y', strtotime( $contest['Contest']['contest_created_on'] ) ); ?>
				</td>
				<td class="actionset">
					<?php echo $html->link('Edit', array('action'=>'edit', $contest['Contest']['contest_id']) ); ?>
					<?php echo $html->link('Delete', array('action'=>'delete', $contest['Contest']['contest_id']) ); ?> 
					<?php echo $html->link('List of Participants', array('action'=>'list_contest_participants', $contest['Contest']['contest_id']) ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>