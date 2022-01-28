<script>
  console.log("cum in HARAAN ");
</script>
<?php

include "bar.php";
include '../engine/connect.php';

// $sql = "SELECT * FROM `company` WHERE `type` = 'Branch' ORDER BY `company`.`name` asc";
// $result = $conn->query($sql);
// $result2 = $conn->query($sql);

// $sql1 = "SELECT * FROM `itemtype` WHERE `status` ='0'";
// $result3  = $conn->query($sql1);

// $sql = "SELECT `location` FROM `staff` WHERE `username`='".$_SESSION['username']."'";
// $result = $conn->query($sql);
//   while($row = $result->fetch_assoc()){
//     $location = $row['location'];
//   }
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
  <form method="POST" action="../engine/test_delivery_order.php" class="form-inline" name="myDO" onsubmit="return validateForm()">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <h2>Delivery Order</h2>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-body">


              <div class="row">

                <!-- <div class="col-md-4 col-sm-6">
                    
                  <input type="text" name="source" placeholder="Source" class="form-control disabled" style="margin-left: 6%;" value="<?php echo $location; ?>" required="">

                </div> -->

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

                <!-- <div class="col-md-3 col-sm-6">
                    <input type="text" name="DO_ID" class="form-control" placeholder="ID">  
              </div> -->

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
                  </tr>
                </thead>
                <tbody>
                  <tr id='addr0'>
                    <td>1</td>
                    <td><input type="text" name='barcode[]'  placeholder='' class="form-control" required minlength="1" maxlength="14" data-filter='[0-9|]*'/>
                    </td>
                    <td><input type="text" name='product_name[]' placeholder='Description' class="form-control" required/></td>
                    <td><input type="text" name='quantity[]' placeholder='' class="form-control" maxlength="6" data-filter='[0-9|.]*'></td>
                  </tr>
                  <tr id='addr1'></tr>
                </tbody>
              </table>
             </div> 

          <div class="row">
              <a id="add_row" class="btn btn-default pull-left cursor-pointer">Add Row</a>
              <a id='delete_row' class="pull-right btn btn-default cursor-pointer">Delete Row</a> <br><br><br>
          </div>
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

console.log("cum in rz-2022");


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
  });

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
  
});


 </script>