<?php
$this->load->view("assets/form_css");
?>
<div style="height:40px;"></div>
<div class="assessment-container container">
    <div class="row">
        <div class="col-md-6 form-box">
            <form role="form" class="registration-form" method="post">
                <fieldset id="first_step">
                  <input type="hidden" name="user_id" class="user_id"> 
                  <div class="form-bottom">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="Lastname" name="lastname" id="lastname">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:3px;">
                        <div class="row">
                            <div class="form-group col-md-9 col-sm-9">
                                <input type="text" class="form-control" placeholder="Contact Number" name="contact_num"  id="contact_num">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-email form-control" id="email" required>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="gender" id="gender">
                            <option>--select gender--</option>
                            <?php
                            $array_gender = array('Male','Female');
                            foreach ($array_gender as $gender) {
                                ?>
                                <option value="<?=$gender?>"><?=$gender?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit" id="next_button" name="next_button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset id="second_step">
                <input type="hidden" name="user_id" class="user_id"> 
                <div class="form-bottom">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="city" name="city" id="city">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="address" name="address" id="address">
                        </div>
                    </div>
                    <button type="button" class="btn btn-previous" id="btn_previous" name="btn_previous">Previous</button>


                    <button type="submit" id="btn_Second_step" name="btn_Second_step" class="btn btn-next">Second Step</button>
                </div>
            </fieldset>

             <fieldset id="third_step">
                <input type="hidden" name="user_id" class="user_id"> 
                <div class="form-bottom">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="education" name="education" id="education">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control" placeholder="designation" name="designation" id="designation">
                        </div>
                    </div>
                    <button type="button" class="btn btn-previous" id="btn_previous" name="btn_previous">Previous</button>

                    <button type="submit" id="btn_third_step" name="btn_third_step" class="btn">Third Step</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>

<?php
$this->load->view("assets/form_js");
?>
<script type="text/javascript">
    $(document).ready(function(){
     if('#next_button'){
         jQuery("#next_button").on("click",function(){ 
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var contact_num = $('#contact_num').val();
            var email = $('#email').val();
            var gender = $('#gender').val();

            if(firstname == 0 || lastname == 0 || contact_num == 0 || email == 0 || gender == 0){
                alert('please fill all fields');
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>adminController/multistepform",
                    dataType : "json",
                    data:$("#first_step").serialize(),
                    success: function(response){
                    // alert(response.inserted_id);
                    $('.user_id').val(response.inserted_id);
                }
            });    
            }
        });
     }

     if('#btn_Second_step'){
        jQuery('#btn_Second_step').on("click",function(){

            var city = $('#city').val();
            var address = $('#address').val();

            if(city == 0 || address == 0){
                alert('please fill all fields');
            }else{
                $.ajax({  
                    type: "POST",
                    url: "<?=base_url()?>adminController/multisecondstepform",
                    dataType : "json",
                    data:$("#second_step").serialize(),
                    success: function(response){
                        //alert(response.inserted_id);
                        $('.user_id').val(response.inserted_id);
                    }
                });    
            }
        });
    }

    if('#btn_third_step'){
        jQuery('#btn_third_step').on("click",function(){

            var education = $('#education').val();
            var designation = $('#designation').val();

            if(education == 0 || designation == 0){
                alert('please fill all fields');
            }else{
                $.ajax({  
                    type: "POST",
                    url: "<?=base_url()?>adminController/multithirdstepform",
                    dataType : "json",
                    data:$("#third_step").serialize(),
                    success: function(response){
                        //alert(response.inserted_id);
                        $('.user_id').val(response.inserted_id);
                    }
                });    
            }
        });
    }
});
</script>
