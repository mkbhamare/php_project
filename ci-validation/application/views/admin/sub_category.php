<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
   <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Sub Category</h3>
      <?php echo validation_errors(); ?>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
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
              <label for="exampleInputName">Select Availability</label>
              <br />
              <select name="cmb_available" class="form-control">
                <option value="">--Select Availability--</option>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
              </select> 
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <label for="exampleInputName">Select Parent Category</label>
            <br />
            <select name="cmb_parent_cat" class="form-control">
              <option value="">--Select Parent Category--</option>
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
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <center><button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success">Submit</button></center>
    </div>
  </form>
</div>
</div>
<div class="col-md-3"></div>
</div>
