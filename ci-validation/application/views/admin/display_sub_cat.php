<div style="padding-left:0;">
	<div class="form-group style="padding-left:0;">
		<label>Select Main Category</label>
		<select class="form-control select2" id="cmb_main_cat" style="width: 25%; ">
			<option selected="selected">--Select Main Category--</option>
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

<div class="box-body">
	<div class="box-header">
		<h3 class="box-title">Sub Category List</h3>
	</div>
	<table id="myTable example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="main_div"></tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		jQuery("#cmb_main_cat").on("change",function(){
			var main_cat = $(this).val();
			//alert(main_cat);
			if(main_cat){
				$.ajax({
					type: "POST",
					url: "<?=base_url()?>productController/displayProductSubCategory",
        // dataType : "json",
        data:{"main_cat" : main_cat},
        success: function (data) {
          // data.key1;
          // data.key2;
          $('#main_div').html(data);
      }
  });  
			}
		});
	});
</script>