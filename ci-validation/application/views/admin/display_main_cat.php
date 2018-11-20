
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Category List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<td>Name</td>
					<td>Description</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($main_category_list as $m) {
					?>
					<tr>
						<td><?=$m->category_id?></td>
						<td><?=$m->category_name?></td>
						<td><?=$m->category_description?></td>
						<td><?=$m->category_status == "0" ? "Unavailable" : "Available" ?></td>
						<td>
							<a class="btn btn-primary" href="<?=base_url()?>productController/updateMainCategory/<?=$m->category_id?>" class="iframe">Edit</a>
							<a class="btn btn-danger" href="<?=base_url()?>productController/deleteMainCategory/<?=$m->category_id?>" onclick="return confirm('are u sure to delete selected record?')">Delete</a>
						</td>
						<?php
					}
					?>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>Id</th>
					<td>Name</td>
					<td>Description</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- /.box-body -->
</div>
