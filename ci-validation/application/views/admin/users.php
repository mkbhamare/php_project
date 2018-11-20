<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Registered Users</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>City</th>
					<th>Hobby</th>
					<th>Contact</th>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($users as $u) {
					?>
					<tr>
						<td><?=$u->user_id?></td>
						<td><?=$u->user_name?></td>
						<td><?=$u->user_gender?></td>
						<td><?=$u->user_city?></td>
						<td><?=$u->user_hobby?></td>
						<td><?=$u->user_contact?></td>
						<td>
							<a class="btn btn-primary" href="<?=base_url()?>adminController/updateUser/<?=$u->user_id?>" class="iframe">Edit</a>
							<a class="btn btn-danger" href="<?=base_url()?>adminController/deleteUser/<?=$u->user_id?>" onclick="return confirm('are u sure to delete selected record?')">Delete</a>
						</td>
					</tr>	
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>City</th>
					<th>Hobby</th>
					<th>Contact</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- /.box-body -->
</div>
