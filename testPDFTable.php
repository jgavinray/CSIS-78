<?php
require('./includes/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Axiom Data',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('product');

$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select * from productDetails order by ID');
$pdf->AddPage();
//Second table: specify 3 columns

$pdf->AddCol('ID',20,'','C');
$pdf->AddCol('name',40,'Name');
$pdf->AddCol('lot',40,'Lot','R');
$pdf->AddCol('actualWeight',40,'Net Weight','C');
$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table('select *, format(lot,0) as lot, name from productDetails order by id limit 0,10',$prop);

$pdf->Output();
?>