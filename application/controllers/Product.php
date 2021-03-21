<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


	public function index()
	{
		$data['title'] = 'Product List';

		 $data['product'] = $this->common->select('products',['product_status'=>'1'],'','','',['id','desc']);
		$this->load->view('productlist',$data);
	}

	function addproduct()
	{
		 $data['title'] = 'Add Product';
		
		  $data['category'] = $this->common->select('product_category',['status'=>1],'','','',['id','desc']);
		 $this->load->view('addproduct',$data);
	}


	 public function saveproduct()
     {
        $postdata = $this->input->post();
        $postdata['description'] = $this->input->post('description',false);
        $postdata['added_date'] = date('Y-m-d H:i:s');
		
		if($this->input->post('files_old'))
		$uploadedold  =  $postdata['files_old'];
	
        if(!empty($postdata['product_name']) && !empty($postdata['product_category_id']) && !empty($postdata['short_description']) && !empty($postdata['price']))
	    {
            if(isset($postdata['id']) && !empty($postdata['id']))
            {
		    $product_id = $postdata['id'];
            $product_images = $this->common->select('product_images',['product_id'=>$product_id],'','','',['id','desc']);
			if($product_images)
			{
		        foreach($product_images as $images)
				{ 
				    if(!in_array($images->id,$postdata['files_old']))
				    $this->common->delete_data(['id'=>$images->id],'product_images');   
				}
				unset($postdata['files_old']);
			}
			  
            $this->common->updatedata('products',$postdata,['id' => $postdata['id']]);
  $this->session->set_flashdata('msg', '<div class="alert alert-success" >Product Updated Succesfully.</div>'); 
            }
            else
            {
		    $existproduct = $this->common->select('products',['product_name'=>$postdata['product_name'],'product_status'=>'1'],'','','',['id','desc']);
		    if(!$existproduct)
            $product_id = $this->common->insert('products',$postdata); 
            $this->session->set_flashdata('msg', '<div class="alert alert-success" > Product Added Succesfully.</div>');  
            } 
			
							if(count($_FILES) > 0){
								$this->load->library('upload'); //loading the library
								$imagePath = './uploads/images/';
								$number_of_files_uploaded = count($_FILES['files']['name']);
								if(count($number_of_files_uploaded) > 0){
									for ($i = 0; $i <  $number_of_files_uploaded; $i++) {
									
										$_FILES['userfile']['name']     = $_FILES['files']['name'][$i] ;
										$_FILES['userfile']['type']     = $_FILES['files']['type'][$i];
										$_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
										$_FILES['userfile']['error']    = $_FILES['files']['error'][$i];
										$_FILES['userfile']['size']     = $_FILES['files']['size'][$i];
										
										$config = array(
											'file_name'     => 'product_'.time(),
											'allowed_types' => 'jpg|jpeg|png|gif',
											'max_size'      => 3000,
											'overwrite'     => FALSE,
											'upload_path'	=> $imagePath
										);
										$this->upload->initialize($config);
										
										if($this->upload->do_upload()){
											$filename = $this->upload->data();
											$file_path = base_url('/uploads/images/'.$filename['file_name']);
												$product_images 			    = [];
												$product_images['product_id'] 	= $product_id;
												$product_images['file_name']  	= $filename['file_name'];
												$product_images['file_url']  	= $file_path;
												$product_images['created_date']    = date('Y-m-d H:i:s');
												$product_images['modified_date']   = date('Y-m-d H:i:s');
												$this->common->insert('product_images',$product_images); 
										}
									}
								}
							}
							
        }
        redirect('product');
    }


    function editproduct($id=0)
    {
    	 $data['title'] = 'Update Product';
    	 $data['product'] = $this->common->selectrow('products',['id'=>$id]);
		 
		 $data['product_images'] = $this->common->select('product_images',['product_id'=>$id,'image_status'=>'1']);
		 
		  $data['category'] = $this->common->select('product_category',['status'=>1],'','','',['id','desc']);
		 $this->load->view('addproduct',$data);
    }


    function deleteproduct($id=0)
    {
          if(!empty($id))
          {
          	 // $this->common->delete_data(['id'=>$id],'products');
				$updatedata = $updatedataimage = [];
				$updatedata['product_status'] =0;
				$this->common->updatedata('products',$updatedata,['id' => $id]);

				$updatedataimage['image_status'] =0;  
				$this->common->updatedata('product_images',$updatedataimage,['product_id' => $id]);
				//$this->common->delete_data(['product_id'=>$id],'product_images');
			  
          	     $this->session->set_flashdata('msg', '<div class="alert alert-success" > Product deleted Succesfully.</div>');
          	          redirect('product');
          }
    }
	
	
	
	function manage_category()
	{
		$data['title'] = 'Category List';
		$data['product_category'] = $this->common->select('product_category',['status'=>'1'],'','','',['id','desc']);
		$this->load->view('categorylist',$data);
	}
	
	
	function add_category()
	{
	  	 $data['title'] = 'Add Category';
		 $this->load->view('addcategory',$data);     
	}
	
	function savecategory()
	{
	    $postdata = $this->input->post();
        $postdata['added_date'] = date('Y-m-d H:i:s');
	    $postdata['modified_date'] = date('Y-m-d H:i:s');
        if(!empty($postdata['category_name']) )
	    {
            if(isset($postdata['id']) && !empty($postdata['id']))
            {
            $this->common->updatedata('product_category',$postdata,['id' => $postdata['id']]);
  $this->session->set_flashdata('msg', '<div class="alert alert-success" >Product Category Updated Succesfully.</div>'); 
            }
            else
            {
            $product_id = $this->common->insert('product_category',$postdata); 
            $this->session->set_flashdata('msg', '<div class="alert alert-success" > Product  Category Added Succesfully.</div>');  
            } 
		}
		redirect('product/manage_category');
	}
	
	function editcategory($id=0)
	{
		$data['title'] = 'Update Category';
		$data['category'] = $this->common->selectrow('product_category',['id'=>$id]);
		$this->load->view('addcategory',$data);
	}
	
	
	function deletecategory($id=0)
	{
	  if(!empty($id))
          {
          	 // $this->common->delete_data(['id'=>$id],'products');
				$updatedata = [];
				$updatedata['status'] =0;
				$this->common->updatedata('product_category',$updatedata,['id' => $id]);


          	     $this->session->set_flashdata('msg', '<div class="alert alert-success" > Product Category deleted Succesfully.</div>');
          	          redirect('product/manage_category');
          }
	}

}
