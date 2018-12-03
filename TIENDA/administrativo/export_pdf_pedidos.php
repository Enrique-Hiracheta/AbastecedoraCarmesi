<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Pedidos',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','tiendaprueba');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,'select fecha,  idCliente, producto, precio, cantidad from t_pedido_detalle', $prop);
$pdf->Output();
?>