<?php include_once('header.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<div id="container">

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Add Category</h5>

            <a href="<?php echo base_url('product'); ?>" class="btn btn-primary" style="float: right;">Manage Category</a>
            <br><br>


 <?php echo form_open_multipart(base_url('product/savecategory'), array('id' => 'add-savecategory')); ?>


 <?php
  if(isset($category) && (!empty($category->category_name)))
  {
	$category_name = $category->category_name;
  	$required='';
  	?>
 <input type="hidden" id="id"  name="id"  value="<?php echo $category->id; ?>">
 
  	<?php
  }
  else
  { 
      $category_name  ='';

      $required='required="required"';
  }
 ?>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" class="form-control" id="category_name"  name="category_name"  required="required" value="<?php echo $category_name; ?>">
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
    $('#add-product').validate({ 
    errorLabelContainer: "#cs-error-note",
    rules: {
          name:{
             required: true,
         },
          sku:{
             required: true,
         },
          price:{
             required: true,
               number: true
         },
          qty:{
             required: true,
               number: true
         },
    },
    submitHandler: function(form) {
                        form.submit();
                     }
    });
});


function removeimage(image_id)
{
	if (confirm("Are you sure you wat to remove image?")) 
   {
	$('#div_image_'+image_id).remove();
   }
}

function removeimageattribute()
{
  $('#fUpload').val('');
  $('#display_hide').hide();
}

$(document).ready(function() {
    var max_fields_limit  = 5; 
    var x = 1; 
    $('#addproduct_options').click(function(e){ 
        e.preventDefault();
        if(x < max_fields_limit){ 
            x++; 
            $('#add-product-options-fields').append('<div class="pl-0 col-md-12 Signup_md_pad form-group pb-0 mb-0"><label class="focus-label"><div class="pb-0 pl-0 col-md-12 mb-0"><input class="pl-0 border-0 form-control file-upload" type="file" accept="image/*" name="files[]" id="fUpload_'+x+'"  ></div></label><button type="button" id="addproduct_options" class="btn btn-danger remove_field">Remove</button></div>'); //add input field
        }
    });  
    $('#add-product-options-fields').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

<style type="text/css">
.error
{
	color: red;
}	
</style>

<script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
</script>
<?php include_once('footer.php'); ?>