<?php include_once('header.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<div id="container">

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Checkout</h5>


 <?php echo form_open_multipart(base_url('orders/checkout'), array('id' => 'add-checkout')); ?>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" class="form-control" id="user_name"  name="user_name"  required="required" >
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" name="user_phone" class="form-control" id="user_phone" required="required">
    </div>
  </div>
  
  
  
  
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" name="user_email" class="form-control" id="user_email" required="required">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" name="user_address" class="form-control" id="user_address" required="required">
    </div>
  </div>

  

  <div class="form-group row">
  	  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>


</div>
</div>
</div>
</div>
</div>
   

</div>

<script type="text/javascript">
 function isNumber(evt) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
} 



$(document).ready(function () {
    $('#add-checkout').validate({ 
    errorLabelContainer: "#cs-error-note",
    rules: {
          user_name:{
             required: true,
         },
          user_phone:{
             required: true,
         },
          user_email:{
             required: true,
			 email:true,
         },
          user_address:{
             required: true,
         },
    },
    submitHandler: function(form) {
                        form.submit();
                     }
    });
});



</script>

<style type="text/css">
.error
{
	color: red;
}	
</style>

<?php include_once('footer.php'); ?>