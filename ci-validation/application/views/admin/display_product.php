
<!-- bootstrap slider -->
<link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/bootstrap-slider/slider.css">

<div class="well">
	<div class="row">
		<form method="post">
			<div style="padding-left:0;" class="col-md-3">
				<div class="form-group style="padding-left:0;">
					<label style="float: right;">Select Main Category</label>
					<select class="form-control select2" id="cmb_parent_cat" name="cmb_parent_cat" style="width: 100%; ">
						<option value="">--Edit Main Category--</option>
						<?php
						foreach ($parent_category as $p) {
							?>
							<option value="<?=$p->category_id?>"><?=$p->category_name?></option>
							<?php
						}	
						?>
					</select>
				</div>
				<h2 id="heading" style="float:left;"></h2>
			</div>

			<div style="padding-left:0;" class="col-md-3">
				<div class="form-group style="padding-left:0;">
					<label style="float: right;">Select Sub Category</label>
					<select name="cmb_sub_cat" id="cmb_sub_cat" name="cmb_sub_cat" class="form-control">
						<option value="">--Select Sub Category--</option>
						<?php
						foreach ($sub_category as $s) {
							?>
							<option value="<?=$s->category_id?>"><?php echo $s->category_name;?></option>
							<?php
						}
						?>
					</select>
				</div>
				<h2 id="heading" style="float:left;"></h2>
			</div>

			<div style="padding-left:0;" class="col-md-3">
				<div class="form-group style="padding-left:0;">
					<label style="float: right;">Enter Product Name</label>
					<input type="text" name="txt_search" class="form-control">
				</div>
				<h2 id="heading" style="float:left;"></h2>
			</div>

			<div style="padding-left:0;" class="col-md-3">
				<div class="form-group style="padding-left:0;">
					<label style="float: right;">Select Status</label>
					<select name="cmb_available" class="form-control">
						<option value="">--Select Availability--</option>
						<option value="1">Available</option>
						<option value="0">Unavailable</option>
					</select> 
				</div>
				<h2 id="heading" style="float:left;"></h2>
			</div>
			<center><input type="submit" name="btn_search" value="Search"></center>
			<br/><br />
		</form>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Product List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body well">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<td>Name</td>
					<td>Description</td>
					<td>Price</td>
					<td>Status</td>
					<td>Category</td>
					<td>Sub Category</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
					//$products = array();
				foreach ($products as $key => $value) {
					?>
					<tr>
						<td><?=$value->product_id?></td>
						<td><?=$value->product_name?></td>
						<td><?=$value->product_description?></td>
						<td><?=$value->product_price?></td>
						<td><?=$value->product_status == '0' ? 'Un-Available' : 'Available';?></td>
						<td><?=$value->product_category?></td>
						<td><?=$value->product_sub_category?></td>
						<td>
							<a class="btn btn-success" href="<?=base_url()?>productController/updateProduct/<?=$value->product_id?>">Edit</a>
							<a class="btn btn-danger" href="<?=base_url()?>productController/deleteProduct/<?=$value->product_id?>" onclick="return confirm('are u sure to delete selected record?')">Delete</a>
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
					<td>Price</td>
					<td>Status</td>
					<td>Category</td>
					<td>Sub Category</td>
					<td>Action</td>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- /.box-body -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		jQuery("#cmb_parent_cat").on("change",function(){
			var parent_cat = $(this).val();
    //alert(parent_cat);
    if(parent_cat){
    	$.ajax({
    		type: "POST",
    		url: "<?=base_url()?>productController/productSubCategory",
        // dataType : "json",
        data:{"parent_cat" : parent_cat},
        success: function (data) {
          // data.key1;
          // data.key2;
          $('#cmb_sub_cat').html(data);
      }
  });  
    }
});	
	});
</script>

<!-- Bootstrap slider -->
<script src="<?=base_url()?>assets/adminlte/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<script>
	$(function () {
		/* BOOTSTRAP SLIDER */
		$('.slider').slider()
	})
</script>