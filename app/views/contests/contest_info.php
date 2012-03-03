<table width="100%" border="0" class="contest_info" >
	<tr>
		<td class="td_head">Name</td>
		<td>
			<h4><?php echo $contest['Contest']['contest_name']; ?></h4>
		</td>
		<td class="td_head">Created On </td>
		<td>
			<h4><?php echo date('F j, Y' , strtotime($contest['Contest']['contest_created_on']) ); ?></h4>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="td_head">Description</td>
	</tr>
	<tr>
		<td colspan="4">
			<h4><?php echo $contest['Contest']['contest_description']; ?></h4>
		</td>
	</tr>
</table>