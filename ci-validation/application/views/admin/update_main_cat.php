<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add Main Category</h3>
				<?php echo validation_errors(); ?>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?=form_open("productController/updateMainCategory/$category_id")?>
			<div class="box-body">

				<div class="form-group">
					<label for="exampleInputName">Name</label>
					<input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter name" value="<?=$category_name?>"> 
				</div>

				<div class="form-group">
					<label for="exampleInputName">Description</label>
					<input type="textarea" class="form-control" id="ta_desc" name="ta_desc" placeholder="Enter Description" value="<?=$category_description?>">
				</div>

				<div class="form-group">
					<label for="exampleInputName">Select Availability</label>
					<br />
					<select name="cmb_available" class="form-control">
						<option value="">--Select Availability--</option>
						<option value="1" <?=$category_status == 1?"selected='selected'" : ""?>>Available</option>
						<option value="0" <?=$category_status == 0?"selected='selected'" : ""?>>Unavailable</option>
					</select> 
				</div>
				<input type="hidden" name="category_id" value="<?=$category_id?>">
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
