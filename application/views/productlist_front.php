<?php include_once('header.php'); ?>
<style>
.productbox {
background-color:#ffffff;
padding:10px;
margin-bottom:10px;
-webkit-box-shadow: 0 8px 6px -6px  #999;
-moz-box-shadow: 0 8px 6px -6px  #999;
	box-shadow: 0 8px 6px -6px #999;
}

.producttitle {
font-weight:bold;
padding:5px 0 5px 0;
}

.productprice {
border-top:1px solid #dadada;
padding-top:5px;
}

.pricetext {
font-weight:bold;
font-size:1.4em;
}
</style>	
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div id="container">
	
	 <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Product List</h2>
			
                <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>


	<div class="row">
	
<?php if($product) { foreach($product as $pro){ ?>
	
<div class="col-md-4 column productbox">
    <img src="<?php echo $pro->file_url; ?>" class="img-responsive" style="height:200px;">
    <div class="producttitle"><?php echo $pro->product_name; ?></div>
    <div class="productprice"><div class="pull-right"><a href="javascript:void(0)"  onclick="addtocart('<?php echo $pro->id; ?>')" class="btn btn-danger btn-sm" role="button">Add to cart</a></div><div class="pricetext">Rs. <?php echo $pro->price; ?></div></div>
</div>
<?php } } ?>

   
  </div>

</div>
</div>
</div>

<div class="col-sm-3">
	<div id="order_item_list"></div>
	</div>
</div>
</div>
   

</div>

<script>
	
	function addtocart(prodcut_id)
	{
	   var quantity	= 1;
		$.ajax({
			url: "<?php echo base_url('orders/add_to_cart'); ?>",
			method: "POST",
			data: {product_id: prodcut_id, quantity: quantity},
			success: function(data){
				$('#order_item_list').show();
				$('#order_item_list').html(data);
			}
		});
	}
$(document).ready(function(){
	
	<?php if($cart_current > 0){ ?>
	$('#order_item_list').load("<?php echo site_url('orders/load_cart');?>");
	<?php } ?>
	
	$(document).on('click','.remove_cart',function(){
		var row_id = $(this).attr("id"); 
		$.ajax({
			url : "<?php echo site_url('orders/delete_cart');?>",
			method : "POST",
			data : {row_id : row_id},
			success :function(data){
				$('#order_item_list').html(data);
			}
		});
	});
	
	
	$(document).on('blur','.update_quantity',function(){
		var row_id		= $(this).data('pro_id');		
		var qty			= $(this).val(); 
		
		$.ajax({
			url : "<?php echo site_url('orders/update_cart');?>",
			method : "POST",
			data : {row_id : row_id, qty:qty},
			success :function(data){
				$('#order_item_list').html(data);
			}
		});
	});

});
</script>


<?php include_once('footer.php'); ?>