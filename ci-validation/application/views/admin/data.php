<div class="box">
	<div class="row">
		<div class="col-md-6">
			<div class="box-header">
				<h3 class="box-title">Registered Users</h3>
			</div>
		</div>
		<div class="col-md-6">
			<div>
				<input type="text" name="txt_user_search" style="float: right" placeholder="search" id="txt_user_search">
			</div>
		</div>
	</div>
	<div >
		<div class="box-body">
			<table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>City</th>
						<th>Hobby</th>
						<th>Contact</th>

					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($users as $u) {
						?>
						<tr>
							<td><?=$u['user_id']?></td>
							<td><?=$u['user_name']?></td>
							<td><?=$u['user_gender']?></td>
							<td><?=$u['user_city']?></td>
							<td><?=$u['user_hobby']?></td>
							<td><?=$u['user_contact']?></td>
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
	</div> 
	<div >
	</div>
	<!-- .box-header -->
	
	<!-- /.box-body -->
</div>

<ul class="pagination pull-right">
	<?php echo $this->pagination->create_links(); ?>
</ul>
<script type="text/javascript">
	jQuery("#txt_user_search").on("keyup",function(){
		var txt_user_search = $(this).val();

		if(txt_user_search){
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>productController/searchUser",
				data:{"txt_user_search" : txt_user_search},
				success: function (data) {
					$('#mytable').html(data);
				}
			});  
		}
	});
</script>