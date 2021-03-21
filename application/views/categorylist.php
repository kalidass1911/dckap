<?php include_once('header.php'); ?>
<div id="container">

	 <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Category List</h5>
			
			 <a href="<?php echo base_url('product'); ?>" class="btn btn-primary">Manage Product</a>
			
			
           <a href="<?php echo base_url('product/add_category'); ?>" class="btn btn-primary"  style="float: right;">Add Category</a>
           
            <br><br>

                <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>

	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php if($product_category) { foreach ($product_category as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->category_name; ?></td>
                <td>
<a  href="<?php echo base_url('product/editcategory/'.$value->id); ?>" class="btn btn-primary">Update</a>
<a  href="<?php echo base_url('product/deletecategory/'.$value->id); ?>" class="btn btn-danger"  onclick="return confirm('Are you sure want to delete this category?')" >Delete</button>
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