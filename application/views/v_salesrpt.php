<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

	<table border="1">
		<tr>
			<th>name</th>
			<th>email</th>
			<th>date</th>
			<th>grandtotal</th>		
		</tr>
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
		</tr>
	<?php } ?>
	</table>
	<br/>
	<?php 
	echo $this->pagination->create_links();
	?>
</body>
</html>