<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->library('cart');
    }

	public function index()
	{
		$data['title'] = 'Product List';
		$data['cart_current'] = count($this->cart->contents());
		$data['product'] = $this->common->getproducts();
		$this->load->view('productlist_front',$data);
	}
	
	
		
	function show_cart_content(){
		$data 		= array();		
		
		$data['cart_data'] = $this->cart->contents();
		$this->load->view('show_cart', $data);
	}
	
	function load_cart(){ 
        echo $this->show_cart_content();
    }
	
	function delete_cart(){
		$result					= '';
		$product_image          = '';
		if(($this->input->method() == 'post') && !empty($this->input->post())){
			$row_id	     	= $this->input->post('row_id');
			
			if($row_id){
				$data = array(
					'rowid' => $row_id, 
					'qty' => 0, 
				);
				$this->cart->update($data);
				$result = $this->show_cart_content();
			}
		}
		
		echo $result;
    }
	
	
	function add_to_cart()
		{
		$result					= '';
		$product_image          = '';
		if(($this->input->method() == 'post') && !empty($this->input->post())){
			$product_id	     	= $this->input->post('product_id');
			$quantity	    	= $this->input->post('quantity');
			
			if(!empty($product_id) && !empty($quantity)){
			$check_product_exist = $this->common->selectrow('products',['id'=>$product_id,'product_status'=>'1']);
				if(count($check_product_exist) > 0){
				$product_image_check = $this->common->selectrow('product_images',['product_id'=>$product_id,'image_status'=>'1']);
				
					if(count($product_image_check) > 0)
					{
							$product_image			= $product_image_check->file_url;
					}
					
					$product_name = str_replace(' ', '-', $check_product_exist->product_name); 
					$product_name = preg_replace('/[^A-Za-z0-9\-]/', '', $product_name);	
					
					$data = array(
						'id' 	=> $check_product_exist->id,
						'name' 	=> $product_name,
						'image' => $product_image,
						'price' => $check_product_exist->price,
						'qty' 	=> $quantity,
					);
					
					$this->cart->insert($data);

					$result = $this->show_cart_content();
				}
			}		
		}
		echo $result;
	}
	
	
	function update_cart(){
		$result					= '';
		$product_image          = '';
		if(($this->input->method() == 'post') && !empty($this->input->post())){
			$row_id	     	= $this->input->post('row_id');
			$qty	     	= $this->input->post('qty');
			
			if($row_id){
				$data = array(
					'rowid' => $row_id, 
					'qty' => $qty, 
				);
				$this->cart->update($data);
				$result = $this->show_cart_content();
			}
		}
		
		echo $result;
    }
	
	
	function checkout()
	{
	   if(count($this->cart->contents()) > 0)
	   {
		$data                       = array();
		$data['title'] = 'Checkout';
		$msg                        = '';
		
		if(($this->input->method() == 'post') AND !empty($this->input->post())){		
                $user_name	     		= $this->input->post('user_name');
				$user_email	     		= $this->input->post('user_email');
				$user_phone	    	= $this->input->post('user_phone');
				$user_address	    	= $this->input->post('user_address');
				
                if(!empty($user_name) &&  !empty($user_email) && !empty($user_phone) && !empty($user_address))
				{
					$order 					= array();
					$order['user_name'] 			= $user_name;
					$order['user_email'] 		= $user_email;
					$order['user_phone'] 		= $user_phone;
					$order['user_address'] 		= $user_address;
					$order['total_amount'] 	= $this->cart->total();
					$order['order_status']      	= '1';
					$order['added_date']   = date('Y-m-d H:i:s');
					$order['modified_date']  = date('Y-m-d H:i:s');
					
					 $order_id = $this->common->insert('orders',$order); 
					
					if($order_id){					
						foreach($this->cart->contents() as   $order_data){
							$order_detail 						= array();
							$order_detail['order_id']= $order_id;
							$order_detail['product_id'] 		= $order_data['id'];
							$order_detail['product_name'] 		= $order_data['name'];
							$order_detail['quantity'] 			= $order_data['qty'];
							$order_detail['price'] 		        = $order_data['price'];
							$order_detail['total_amount'] 		= $order_data['subtotal'];
							$order_detail['added_date']   	    = date('Y-m-d H:i:s');
							$order_detail['modified_date']  	= date('Y-m-d H:i:s');
							$order_id = $this->common->insert('order_details',$order_detail);
						}
						
						$this->cart->destroy();
						  $this->session->set_flashdata('msg', '<div class="alert alert-success" >Order placed Succesfully.</div>'); 
						redirect('orders/index');
						exit;
						
					}
					
				}
		   }
	   }
	   else
		{
		   redirect('orders/index');
			exit;
		}
		
		
		$this->load->view('check_outpage',$data);
	}

	
}
