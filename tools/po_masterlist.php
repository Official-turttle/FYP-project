<?php

include "bar.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masterlist</title>


    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">



</head>

<body>

    <div class="container-fluid">
        <h2>Purchase Order Master List</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="do_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PO Date</th>
                                    <th>PO ID</th>
                                    <th>Item Code</th>
                                    <th>Product Name</th>
                                    <th>Completion Status</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Payment Date</th>
                                </tr>
                            <tbody>
                                <?php
                                include '../engine/connect.php';
                                $i = 1;

                                $sql = "SELECT *, purchase_order.ID 
                                            FROM purchase_order 
                                            INNER JOIN purchase_order_detail
                                            ON purchase_order.ID = purchase_order_detail.po_ID
                                            ORDER BY purchase_order.ID
                                            DESC";





                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {

                                    // $id          = $row['ID'];  
                                    $DO_ID       = $row['po_ID'];
                                    // $do_date     = date("d/m/Y",strtotime($row["po_date"]));
                                    $supplier    = $row['supplier'];
                                    $tax         = $row['tax'];
                                    $tax_total   = $row['tax_total'];
                                    $total       = $row['total'];
                                    $barcode     = $row['barcode'];
                                    $product     = $row['product'];
                                    $quantity    = $row['quantity'];
                                    $price       = $row['price'];
                                    $total_price = $row['total_price'];






                                    if ($row["status"] == 1) {
                                        $shake = "Pending Payment";
                                    } elseif ($row["status"] == 2) {
                                        $shake = "Paid";
                                        # code...
                                    }





                                    //start of display the drop down choice


                                    //end

                                    if ($row["completation_date"] != null) {
                                        $receive_date = date("d/m/Y", strtotime($row["completation_date"]));
                                    } else {
                                        $receive_date = "No Receive Date";
                                    };

                                    if ($row["po_date"] != null) {
                                        $do_date = date("d/m/Y", strtotime($row["po_date"]));
                                    } else {
                                        $do_date = "No Date";
                                    };




                                    echo "
                                        <tr>
                                        <td>    " . $i++ . "</td> 
                                        <td>    " . $do_date . "</td>
                                        <td>    " . $DO_ID . "</td>
                                        <td>    " . $barcode . "</td>
                                        <td>    " . $product . "</td>
                                        <td>    " . $shake . "</td>
                                        <td>    " . "RM" . " " . $price . "</td> 
                                        <td>    " . "RM" . " " . $total_price . "</td> 
                                        <td>    " . $receive_date . "</td>";


                                    "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
<script>
    $(document).ready(function() {
        var table = $('#do_table').DataTable({


            "bInfo": false,
            "showNEntries": true,
            "order": [],
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                "orderable": true,



            }, ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records"
            }
        });

        $('#source').on('change', function() {

            table
                .column(8)
                .search(this.value)
                .draw();
        })
        $('#destination').on('change', function() {

            table
                .column(9)
                .search(this.value)
                .draw();

        })
        //$('#date').datepicker({"dateFormat":"d/m/yy"});
        $('#date').on('change', function() {

            table
                .column(1)
                .search(this.value)
                .draw();

        })



    });
</script>