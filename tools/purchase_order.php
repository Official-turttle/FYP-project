<?php 
  include 'bar.php';
  include '../engine/connect.php';
  include '../engine/restriction.php';

  // $sql="SELECT supplier_name FROM supplier_list";
  // $result = mysqli_query( $conn->query($sql));
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 
 	<title>
 		
 	</title>
 	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script> 

	<script src="//code.jquery.com/jquery-1.11.1.min.js">
	</script>
 </head>
 <body>	
 	<form method="POST" action="../engine/purchase_order_insert.php" class="form-inline">
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h2>Purchase Order</h2>
      <div class="row">
        <div class="col-s ">
          <input type="text" name="supplier" placeholder="supplier" class="form-control" style="margin-left: 6%;">
        </div>
        <div class="col-sm">
 				 		<input type="text" name="po_ID" class="form-control" placeholder="Purchase Order Number" style="margin-left: 2%">
 				 		<input placeholder="Purchase Order Date" class="form-control"type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="po_date" style="margin-left: 2%">
 		</div>
    
 		<!-- <div class="col-md-1" style="margin-right: 60%; margin-top:1%;">
 				 	<select class="custom-select" name="status" required>
 				 		<option value="" disabled selected hidden>
 				 			Status
 				 		</option>
 				 		<option value="1">
 				 			Approve
 				 		</option>
 				 		<option value="2">
 				 			Decline
 				 		</option>
 				 	</select>
 		</div> -->
      </div>
    </div>
  </div>
</div>
		 
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><input type="text" name='product[]'  placeholder=' Product Name' class="form-control"/></td>
            <td><input type="number" name='quantity[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total' placeholder='0.00' class="form-control total" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <a id="add_row" class="btn btn-default pull-left">Add Row</a>
      <a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px; margin-left: 70% ">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly name="sub_total" /></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" value="6" name="tax" disabled>
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly name="tax_amount" /></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly name="grand_total" /></td>
          </tr>
        </tbody>
      </table>
      </div>
  </div>
     
        <button type="submit" class="btn btn-primary" name="register_btn">Create Invoice</button>
      </div>
</div>				
 	</form>
 
 </body>
 </html>
 <script>
 	$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}
 </script>