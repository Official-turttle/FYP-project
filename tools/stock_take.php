<?php
    include 'bar.php';
?>

<html>



 <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
 <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<head>
    
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <?php

                $i =1;
                include '../engine/connect.php';

                if(isset($_GET['ID'])){

                    $ID =(int) $_GET['ID'];

                    $sql = "SELECT * FROM inventory  
                            WHERE inventory.ID=".$ID;
                    echo"
                    <table class='table table-bordered'>
                        <form action='../engine/stock_take.php?ID=".$ID."' method='POST'>
                        <thead>
                            <tr>
                            <th>
                                Product Name
                                </th>
                                <th>
                                Barcode
                                </th>
                                <th>
                                Category
                                </th>
                                <th>
                                Supplier
                                </th>
                                <th>
                                    Rack location
                                </th>
                                <th>
                                   Total Quantity
                                </th>
                                <th>
                                    Description
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        ";
                            
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()){
                                    $product     = $row['name'];
                                    $barcode     = $row['barcode'];
                                    $category    = $row['category'];
                                    $supplier    = $row['supplier']; 
                                    $rack        = $row['rack'];  
                                    $quantity    = $row['quantity'];
                                }
                                echo"
                                <tr>
                                <td>"."<input type='text' class='form-control' value='$product' disabled>"."</td>
                                <td>".$barcode."</td>
                                <td>".$category."</td>
                                <td>".$supplier."</td>
                                <td>"."<input type='text' class='form-control' value='$rack' name='rack' maxlength='3' oninput='this.value = this.value.toUpperCase()' required >"."</td>
                                <td>"."<input type='text' class='form-control' value='$quantity' name='quanti' data-filter='[0-9|]*' required>"."</td>
                                <td>"."<input type='text' class='form-control'  name='descrition' required >"."</td>
                                </tr>";

                            }
                            echo"</table>";
                            ?>
               <button type="submit" class="btn btn-primary" name="received_btn">Update Stock</button>

                        </tbody>
                        </form>
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>

$(document).ready( function () {
    $('#do_table').DataTable({

    "bInfo" : false,
    "order":[],
    "columnDefs":[
      {
        "targets":[0,1,2,3,4],
        "orderable":true,
      },
    ],
  });
  
} );  


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