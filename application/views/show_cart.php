<?php $CI =& get_instance(); ?>
<div>
    <div class="heading"><p>Shopping Cart</p></div>
    <div class="cart_item">
        <table cellpadding="3" cellspacing="3" width="100%" border="1">
            <thead>
                <tr style="border-bottom: 1px solid;">
				    <th>Remove</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($cart_data) > 0){
                    foreach($cart_data as $key => $val){
                ?>
                <tr>
				    <td align="left"><button type="button" id="<?php echo $key; ?>" class="remove_cart btn btn-danger btn-sm">Delete</button></td>
                    <td align="left"><?php echo $val['name']; ?></td>
                    <td align="left"><?php echo number_format($val['price']); ?></td>
                    <td align="left"><input type="text" name="quantity" id="quantity" class="update_quantity" data-pro_id="<?php echo $key; ?>" value="<?php echo $val['qty']; ?>"></td>
                    <td align="left"><?php echo number_format($val['subtotal']); ?></td>
                    
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td align="left"><strong>Total ( INR ) :</strong></td>
                    <td align="left"><?php echo $CI->cart->format_number($CI->cart->total()); ?></td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>                    
                    <td colspan="5">
					<br>
                        <div><button onclick="checkoutprocss()" class="btn btn-primary">Proceed Checkout</button>
                        <div style="clear:both;height:15px; ">&nbsp;</div>                        
                    </td>
                </tr>
                <?php
                } else {
                ?>
                <tr><td colspan="5">No card data available </td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</div>


<script>
function checkoutprocss()
{
window.location.href='<?php echo base_url('orders/checkout'); ?>';
}
	
</script>	