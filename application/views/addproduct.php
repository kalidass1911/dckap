<?php include_once('header.php'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<div id="container">

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Add Product</h5>

            <a href="<?php echo base_url('product'); ?>" class="btn btn-primary" style="float: right;">Product List</a>
            <br><br>


 <?php echo form_open_multipart(base_url('product/saveproduct'), array('id' => 'add-product')); ?>


 <?php
  if(isset($product) && (!empty($product->product_name)))
  {
	$product_category_id = $product->product_category_id;
  	$product_name = $product->product_name;
  	$short_description = $product->short_description;
  	$price = $product->price;
  	$quantity = $product->quantity;
  	$description = $product->description;
  	$required='';
  	?>
 <input type="hidden" id="id"  name="id"  value="<?php echo $product->id; ?>">
 
  	<?php
  }
  else
  { 
      $product_category_id = $product_name =  $short_description =  $price =  $quantity =  $description ='';

      $required='required="required"';
  }
 ?>
 
 <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Category</label>
    <div class="col-sm-6">
      <select name="product_category_id" id="product_category_id" class="form-control"  required="required" >
	  <option value="">--Select Category--</option>
	   <?php
	    if($category){ foreach($category as $cate){ ?>
		 <option value="<?php echo $cate->id; ?>" <?php  echo($product_category_id==$cate->id)?'selected':''; ?>><?php echo $cate->category_name; ?></option>
		<?php } } ?>
	  </select>
    </div>
  </div>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" class="form-control" id="product_name"  name="product_name"  required="required" value="<?php echo $product_name; ?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Short Description</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" name="short_description" class="form-control" id="short_description" required="required" value="<?php echo $short_description; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">price</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" class="form-control" name="price" id="price"  required="required" value="<?php echo $price; ?>">
    </div>
  </div>


<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">quantity</label>
    <div class="col-sm-6">
      <input autocomplete="off" type="input" class="form-control" name="quantity"  id="quantity" required="required" value="<?php echo $quantity; ?>">
    </div>
  </div>


<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">description</label>
    <div class="col-sm-10">
    	<textarea name="description" id="description"  required="required"><?php echo $description; ?></textarea>
    </div>
  </div>



  
				<div class="form-group row" id="parent_div_image">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Product Images</label>
				<label class="focus-label">
				<div class="pl">
				<input class="pl-0 border-0 form-control file-upload" type="file" accept="image/*" name="files[]"  id="fUpload">
				</div>
				</label>
				<button type="button" class="btn btn-danger remove_field" id="display_hide" style="display: none;" onclick="removeimageattribute()" ><i class="fe fe-trash"></i></button>

				<div class="pl-0">
				<button type="button" id="addproduct_options" class="btn btn-primary bor-def">
				Add More
				</button>
				</div>				   
				</div>

				<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
				<div id="add-product-options-fields"></div>
				</div>
	
	<?php if(isset($product_images) && count($product_images)>0){ ?>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Product Images</label>
	<?php if(isset($product_images) && count($product_images)>0){  foreach($product_images as $images) { ;?>
    <div class="col-sm-3" id="div_image_<?php echo $images->id; ?>">
      <img src="<?php echo $images->file_url; ?>" style="height:100px;">
	  <button type="button" onclick="removeimage('<?php echo $images->id; ?>');"  class="btn btn-danger">Remove</button>
     <input  type="hidden" value="<?php echo $images->id; ?>" id="<?php echo $images->id; ?>" name="files_old[]" >
   </div>
	  <?php } } ?>
  </div>
  <?php }  ?>




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