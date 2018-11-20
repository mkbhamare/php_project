<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Update Product</h3>
				<?php echo validation_errors(); ?>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?=form_open_multipart("productController/updateProduct/$product_id")?>
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputName">Name</label>
					<input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter name" value="<?=$product_name?>"> 
				</div>

				<div class="form-group">
					<label for="exampleInputName">Description</label>
					<input type="textarea" class="form-control" id="ta_desc" name="ta_desc" placeholder="Enter Description" value="<?=$product_description?>">
				</div>


				<div class="form-group">
					<label for="exampleInputName">Price</label>
					<input type="text" class="form-control" id="txt_price" name="txt_price" placeholder="Enter price" value="<?=$product_price?>"> 
				</div>

				<div class="form-group">
					<label for="exampleInputName">Select Availability</label>
					<br />
					<select name="cmb_available" class="form-control">
						<option value="">--Select Availability--</option>
						<option value="1" <?=$product_status == 1?"selected='selected'" : ""?>>Available</option>
						<option value="0" <?=$product_status == 0?"selected='selected'" : ""?>>Unavailable</option>
					</select> 
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputName">Select Main Category</label>
							<br />

							<select name="cmb_parent_cat" id="cmb_parent_cat" class="form-control">
								<option value="">--Select Main Category--</option>
								<?php
								foreach ($parent_category as $p) {
									?>
									<option value="<?=$p->category_id?>" <?php echo ($p->category_id==$product_category) ? "selected":""; ?>><?php echo $p->category_name;?></option>
									<?php
								}
								?>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputName">Select Sub Category</label>
							<br />
							<select name="cmb_sub_cat" id="cmb_sub_cat" class="form-control">
								<option value="">--Select Sub Category--</option>
								<?php
								foreach ($sub_category as $s) {
									?>
									<option value="<?=$s->category_id?>" <?php echo ($s->category_id==$data['product_sub_category']) ? "selected":""; ?>><?php echo $s->category_name;?></option>
									<?php
								}
								?>
							</select> 
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName">Product Image</label>
					<input type="file" name="product_image" size="20" />
				</div>
				<input type="hidden" name="product_id" value="<?=$product_id?>">
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<center><button type="submit" id="btn_update" name="btn_update" class="btn btn-success">Submit</button></center>
			</div>
		</form>
	</div>
</div>
<div class="col-md-3"></div>
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