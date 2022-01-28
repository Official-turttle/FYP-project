<?php

include "bar.php";
include '../engine/connect.php';


        $sql = "SELECT * FROM `supplier_list` WHERE status ='1'";
        $result = $conn -> query($sql);

?>
 <!DOCTYPE html>
 <html>
 <head>
 
  <title>
    
  </title>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 -->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
  </script> -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" > -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>  -->

      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="//code.jquery.com/jquery-1.11.1.min.js">
  </script>

     <style>
    input.disabled {
  pointer-events: none;
  cursor: default;
}

.cursor-pointer{
  cursor: pointer;
}

    
    </style>


 </head>
 <body> 
  <form method="POST" action="../engine/test_insert_purchase_order.php" class="form-inline" name="myPO">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <h2>Purchase Order</h2>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-body">


              <div class="row">


                <div class="col-md-4 col-sm-6">
                <select class="form-control" name="supplier">
                        <?php while ($row = $result->fetch_assoc()) {
                          $name=$row['supplier_name'];?>
                          <option class="placeholder"value="<?php echo $name ?>"><?php echo $name;?></option>
                        <?php } ?>
                      </select>
                 </div>

                 <div class="col-md-4 col-sm-6">
                    <!-- <input class="form-control disabled"type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="today" name="do_date" required > -->
                    <input type="text" value="<?php echo date("d/m/Y"); ?>" class="form-control disabled">
                </div>



              </div>

         </div>
      </div>
    </div>

    <br>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">

          <div class="table-responsive">
             
              <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                  <tr>
                    <th class="text-center"> #              </th>
                    <th class="text-center"> Barcode        </th>
                    <th class="text-center"> Product Name   </th>
                    <th class="text-center"> Quantity       </th>
                    <th class="text-center"> Price          </th>
                    <th class="text-center"> Total          </th>
                  </tr>
                </thead>
                <tbody>
                  <tr id='addr0'>
                    <td>1</td>
                    <td><input type="text" name='barcode[]'      placeholder=''            class="form-control" required minlength="1" maxlength="14" data-filter='[0-9|]*'/></td>
                    <td><input type="text" name='product_name[]' placeholder='item name'   class="form-control" required/></td>
                    <td><input type="text" name='quantity[]'     placeholder='quantity'    class="form-control quantity" maxlength="6" data-filter='[0-9|]*'></td>
                    <td><input type="text" name='price[]'                                  class="form-control price" step="0.00" min="0" data-filter='[0-9|.]*'></td>
                    <td><input type="text" name='total[]' class="form-control total" readonly></td>
                  </tr>
                  <tr id='addr1'></tr>
                </tbody>
              </table>
             </div> 

          <div class="row">
              <a id="add_row" class="btn btn-default pull-left cursor-pointer">Add Row</a>
              <a id='delete_row' class="pull-right btn btn-default cursor-pointer">Delete Row</a> <br><br><br>
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
                <input type="number" class="form-control" id="tax" value="6" name="tax" readonly>
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly name="tax_amount" /></td>
          </tr>
          <!-- <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_ammount' id="total_amount" placeholder='0.00' class="form-control" readonly name="grand_total" /></td>
          </tr> -->
          <tr>
              <th class="text-center">Grand Total</th>
              <td class="text-center"><input type="text" name="total_ammount" id="total_amount" placeholder="0.00" class="form-control" readonly></td>
          </tr>
        </tbody>
      </table>
      </div>
        
  </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary" name="register_btn">Create Delivery Order</button>
        </div>
        </div>  
        </div>      
          </form>

     </div>
      </div>
    </div>
  

 </body>
 </html>

 <script>




  $(document).ready(function(){

    //  let today = new Date().toLocaleDateString().substr(0, 10);
    //   document.querySelector("#today").value = today;
     //add row function
    var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    });

    //delete row function
    $("#delete_row").click(function(){
      var x = confirm("delete row ?");
      if(i>1 && x == true){
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
			var qty = $(this).find('.quantity').val();
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

  // Apply filter to all inputs with data-filter:
let inputs = document.querySelectorAll('input[data-filter]');

for (let input of inputs) {
  let state = {
    value: input.value,
    start: input.selectionStart,
    end: input.selectionEnd,
    pattern: RegExp('^' + input.dataset.filter + '$')
  };
  
  input.addEventListener('input', event => {
    if (state.pattern.test(input.value)) {
      state.value = input.value;
    } else {
      input.value = state.value;
      input.setSelectionRange(state.start, state.end);
    }
  });

  input.addEventListener('keydown', event => {
    state.start = input.selectionStart;
    state.end = input.selectionEnd;
  });
}
  



 </script>