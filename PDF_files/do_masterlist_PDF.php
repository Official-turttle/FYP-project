<?php

require ('../fpdf.php');
include '../engine/connect.php';

class PDF extends FPDF{
    function Header(){
        $this -> SetFont('Arial','B',15);

        $this -> cell(12);
        $this -> cell(100,10,'Delivery Order List',0,1);

        $this -> Ln(5);

        $this -> SetFont('Arial','B',10);

        $this -> SetFillColor(180,180,255);
        $this -> SetDrawColor(50,50,100);
        $this -> Cell(15,5,'Do ID',1,0,'', True);
        $this -> Cell(25,5,'DO date',1,0,'', True);
        $this -> Cell(38,5,'Supplier',1,0,'', True);
        $this -> Cell(30,5,'Item Code',1,0,'', True);
        $this -> Cell(30,5,'Product Name',1,0,'', True);
        $this -> Cell(20,5,'Status',1,0,'', True);
        $this -> Cell(28,5,'Received Date',1,1,'', True); // <- table header
        // $this -> Cell(40,5,'Name',1,0,'', True);
    }

    function Footer(){
        $this -> SetY(-15);

        $this -> SetFont('Arial','',8);

        $this -> Cell(0,10,'Page'.$this->PageNo()." / {pages}",0,0,'c');


    
        
    }

}

$pdf = new PDF('p','mm','A4');

$pdf ->AliasNbPages('{pages}');

$pdf -> SetAutoPageBreak(true,15);


$pdf ->AddPage();
$pdf ->SetFont('Arial','',9);
$pdf ->SetDrawColor(50,50,100);

$i=1;
$query = mysqli_query($conn, "SELECT *, delivery_order.ID 
                                FROM delivery_order 
                                INNER JOIN delivery_order_detail
                                ON delivery_order.ID = delivery_order_detail.DO_ID
                                ORDER BY delivery_order.ID
                                DESC");


    while ($data=mysqli_fetch_array($query)) {

        $pdf -> Cell(15,5,$data['DO_ID'],1,0);
        $pdf -> Cell(25,5,$data['do_date'],1,0,);
        $pdf -> Cell(38,5,$data['supplier'],1,0);

        $pdf -> Cell(30,5,$data['barcode'],1,0);
        $pdf -> Cell(30,5,$data['product'],1,0);
        // $pdf -> Cell(20,5,$data['status'],1,0);
        if ($data['status'] == 1) {
            $pdf -> Cell(20,5,"Pending",1,0);
            # code...
        }
        else if ($data['status']==2) {
            $pdf -> Cell(20,5,"Complete",1,0);

            # code...
        }
        if ($data['recieved_date']!= null) {
            $pdf -> Cell(28,5,$data['recieved_date'],1,1);

            # code...
        }
        else{
            $pdf -> Cell(28,5,"No Date",1,1);
        }

        # code...
    }

$pdf ->Output();
?>