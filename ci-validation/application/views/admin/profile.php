
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Quick Example</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?=form_open("adminController/profile/$admin_id")?>
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="text" class="form-control" name="txt_name" id="exampleInputName" placeholder="Enter name" value="<?=$admin_name?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="txt_email" id="exampleInputEmail1" placeholder="Enter email" value="<?=$admin_email?>">
        </div>
      </div>
      <input type="hidden" name="admin_id" value="<?=$admin_id?>">
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" name="btn_update" class="btn btn-primary">Update</button>
      </div>
    </form>   
  </div>
  <div class="col-md-3"></div>
</div> 
</div>