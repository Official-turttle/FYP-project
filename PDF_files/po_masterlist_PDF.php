<?php

require ('../fpdf.php');
include '../engine/connect.php';

class PDF extends FPDF{
    function Header(){
        $this -> SetFont('Arial','B',15);

        $this -> cell(15);
        $this -> cell(100,10,'Purchase Order List',0,1);

        $this -> Ln(5);

        $this -> SetFont('Arial','B',10);
        

        $this -> SetFillColor(180,180,255);
        $this -> SetDrawColor(50,50,100);
        $this -> Cell(13,5,'PO ID',1,0,'', True);
        $this -> Cell(25,5,'PO date',1,0,'', True);
        $this -> Cell(20,5,'Supplier',1,0,'', True);
        $this -> Cell(30,5,'Item Code',1,0,'', True);
        $this -> Cell(30,5,'Product Name',1,0,'', True);
        $this -> Cell(20,5,'Status',1,0,'', True);
        $this -> Cell(20,5,'Completion Date',1,0,'L', True);
        $this -> Cell(15,5,'Price (per) ',1,0,'', True); 
        $this -> Cell(15,5,'Total Ammount',1,1,'', True);// <- table header
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
$query = mysqli_query($conn, "SELECT *, purchase_order.ID 
                                FROM purchase_order 
                                INNER JOIN purchase_order_detail
                                ON purchase_order.ID = purchase_order_detail.po_ID
                                ORDER BY purchase_order.ID
                                DESC");
                                
                                // if ($row["status"] == 1) {
                                //     $shake = "Preparing";                
                                //     }
                                // elseif ($row["status"] == 2) {
                                //     $shake = "Completed";
                                //     # code...
                                // }


    while ($data=mysqli_fetch_array($query)) {

      

        // $pdf -> Cell(10,5,$data[$i++],1,0);
        $pdf -> Cell(13,5,$data['po_ID'],1,0);
        $pdf -> Cell(25,5,$data['po_date'],1,0,);
        $pdf -> Cell(20,5,$data['status'],1,0);

        // if ($pdf -> $data['recieved_date']!= null) {
        //     $pdf -> Cell(25,5,$data['recieved_date'],1,1);
        //     # code...
        // }
        // else {
        //     $pdf -> Cell(25,5,"No data",1,1);
        // }
        $pdf -> Cell(30,5,$data['barcode'],1,0);
        $pdf -> Cell(30,5,$data['product'],1,0);
        $pdf -> Cell(20,5,$data['status'],1,0);
        $pdf -> Cell(20,5,$data['completation_date'],1,);
        $pdf -> Cell(15,5,"RM".$data['price'],1,0);
        $pdf -> Cell(15,5,"RM".$data['total_price'],1,1);
        // if ($pdf -> $data['recieved_date']!= null) {
        //     $pdf -> Cell(25,5,$data['recieved_date'],1,1);
        //     # code...
        // }
        // else {
        //     $pdf -> Cell(25,5,"No data",1,1);
        // }

        # code...
    }

$pdf ->Output();
?>