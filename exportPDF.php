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
if (!isset($_SESSION)) 
        {
          session_start();
        }
        
        if (!isset($_SESSION['isLoggedIn'])) 
        {
            header("Location: ./");
        }
        
//Connect to database
mysql_connect('localhost','root','');
$currentDB = $_SESSION['currentDB'];
$query = $_SESSION['currentQuery'];
//mysql_select_db('product');
mysql_select_db($currentDB);

$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select * from productDetails order by ID');
$pdf->AddPage();
//Second table: specify 3 columns
if ($currentDB == "product")
{
$pdf->AddCol('ID',10,'','C');
$pdf->AddCol('name',40,'Name','C');
$pdf->AddCol('lot',15,'Lot','C');
$pdf->AddCol('batchSize',25,'Batch Size','C');
$pdf->AddCol('targetWeight',30,'Target Weight','C');
$pdf->AddCol('actualWeight',30,'Actual Weight','C');
$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
}
if ($currentDB == "users")
{
$pdf->AddCol('ID',10,'','C');
$pdf->AddCol('firstName',40,'First Name','C');
$pdf->AddCol('lastName',40,'Last Name','C');
$pdf->AddCol('login',25,'Login','C');
$pdf->AddCol('password',30,'Password','C');
$pdf->AddCol('isAdmin',30,'Administrator','C');
$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
}
//$pdf->Table('select *, format(lot,0) as lot, name, batchSize from productDetails order by id limit 0,10',$prop);
$pdf->Table($query,$prop);
//
$pdf->Output();
?>