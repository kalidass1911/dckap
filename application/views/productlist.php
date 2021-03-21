<?php include_once('header.php'); ?>
<div id="container">

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Product List</h5>
			
			 <a href="<?php echo base_url('product/manage_category'); ?>" class="btn btn-primary"  >Manage Categories</a>

            <a href="<?php echo base_url('product/addproduct'); ?>" class="btn btn-primary"  style="float: right;" >Add Product</a>
            <br><br>

                <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>

	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Short description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php if($product) { foreach ($product as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->product_name; ?></td>
                <td><?php echo $value->short_description; ?></td>
                <td>Rs. <?php echo $value->price; ?></td>
                <td><?php echo $value->quantity; ?></td>
                <td>
<a  href="<?php echo base_url('product/editproduct/'.$value->id); ?>" class="btn btn-primary">Update</a>
<a  href="<?php echo base_url('product/deleteproduct/'.$value->id); ?>" class="btn btn-danger"  onclick="return confirm('Are you sure want to delete this product?')" >Delete</button>
                </td>
            </tr>

        <?php } } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
   

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );	
</script>
<?php include_once('footer.php'); ?>