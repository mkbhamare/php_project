<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
   <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Register Here</h3>
      <?php echo validation_errors(); ?>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?=form_open("adminController/updateUser/$user_id")?>
    <div class="box-body">

      <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter name" value="<?=$user_name?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Enter email" value="<?=$user_email?>">
      </div>

      <label for="gender">Select Gender</label>
      <div class="form-group">
        <?php
        $arr_gender = array('Male','Female');
        foreach ($arr_gender as $gender) {
          ?>
          <label><input type="radio" id="rdo_male_gender" name="rdo_gender" value="<?=$gender?>" <?=$user_gender==$gender?"checked":""?>><?=$gender?></label>
          <?php
        }
        ?>
      </div>

      <div class="form-group">
        <label for="exampleInputName">Contact</label>
        <input type="text" class="form-control" id="txt_contact" name="txt_contact" placeholder="Enter Contact" value="<?=$user_contact?>">
      </div>

      <div class="form-group">
        <label for="exampleInputName">Select City</label>
        <br />
        <select name="cmb_city">
          <option value="">--Select City--</option>
          <?php
          $arr_city = array('Mumbai','Nashik','Pune');
          foreach ($arr_city as $city) {
            ?>
            <option value="<?=$city?>" <?=$user_city==$city?"selected":""?>><?=$city?></option>
            <?php
          }
          ?>
        </select> 
      </div>

   <!--    <div class="form-group">
        <label for="exampleInputName">Select Hobby</label>
        <br />
        <?php
        $arr_hobby = array('Playing','Cooking','Reading','Dancing','Swiming');
        foreach ($arr_hobby as $hobby) {
          ?>
          <label><input type="checkbox" name="chk_hobby[]" value="<?=$hobby?>" <?=in_array($chk_hobby,$user_hobby)?"checked":""?>><?=$hobby?></label>
          <?php
        }
        ?>
      </div> -->

    <?php
    $arr_hobby = array('Playing','Cooking','Reading','Dancing','Swiming');
      foreach ($arr_hobby as $hobby) {
        ?>
          <label><input type="checkbox" name="chk_hobby[]" value="<?=$hobby?>" <?=in_array($hobby,$user_hobby)?"checked":""?>><?=$hobby?></label>
        <?php
      }
    ?> 
    </div>
    <!-- /.box-body -->
    <input type="hidden" name="user_id" value="<?=$user_id?>">
    <div class="box-footer">
      <center><button type="submit" id="btn_update" name="btn_update" class="btn btn-success">Submit</button></center>
    </div>
  </form>
</div>
</div>
<div class="col-md-3"></div>
</div>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#btn_submit').click(function(){
      var data = $('#submit_form').serialize();
      $.ajax({  
       url:"adminController/register",  
       method:"POST",  
       data: data
    });
    });
  });
</script> -->
