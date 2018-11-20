<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
   <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Product</h3>
      <?php echo validation_errors(); ?>
    </div>
    <form role="form" id="submit_form" method="post">
      <div class="box-body">

        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label for="exampleInputName">Description</label>
          <input type="textarea" class="form-control" id="ta_desc" name="ta_desc" placeholder="Enter Description">
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputName">Price</label>
              <input type="text" class="form-control" id="txt_price" name="txt_price" placeholder="Enter Price">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputName">Select Availability</label>
              <select name="cmb_available" class="form-control">
                <option value="">--Select Availability--</option>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
              </select> 
            </div>
          </div>
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
                <option value="<?=$p->category_id?>"><?php echo $p->category_name;?></option>
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
              <option value="<?=$s->category_id?>"><?php echo $s->category_name;?></option>
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
  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <center><button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success">Submit</button></center>
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-3"></div>
</div>

<script type="text/javascript">
  function getSubCategory12(){
    var parent_cat = $('#cmb_parent_cat').val();
    //alert(parent_cat);
    if(parent_cat){
      $.ajax({
        type: "POST",
        url: "<?=base_url()?>productController/productSubCategory",
        // dataType : "json",
        data:{"parent_cat" : parent_cat},
        success: function (data) {
          $('#cmb_sub_cat').html(data);
        }
      });  
    }
  }

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
</script>
