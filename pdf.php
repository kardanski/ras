<?php
                
   //  require('fpdf.php');
    
   require('tfpdf.php');

/*
class PDF extends FPDF
{
function Header()
{
    $this->Image('logo.png',95,5,20);
    // Select Arial bold 15
    $this->SetFont('Arial','I',16);
    // Move to the right
    $this->Cell(70);
    // Framed title
    $this->Cell(45,40,'Tehnicka skola GSP',0,0,'C');
    // Line break
    $this->Ln(35);
}
    
    function Footer()
{
        $this->SetY(-15);
    // Select Arial bold 15
    $this->SetFont('Arial','',10);
        
    // Move to the right
    $this->Cell(70);
    // Framed title
    $this->Cell(50,10,'strana '.$this->PageNo(),0,0,'C');
   
}
    
} 


$pdf = new FPDF();

$pdf->AddFont('Times','','times.php',true);
$pdf->AddPage();
//$pdf->AddFont('timescirilica','','times.ttf',true);
$pdf->SetFont('Times','',14);

//$pdf->Cell(0,16,'grgr',0,1,'C');
$pdf->MultiCell(0,6,'šćččpšćžđšćžđhhhhggg',0,'L');
$pdf->Output('I');           
                */
                
    //  header('Location: raspored.php');     

class PDF extends tFPDF
{
function Header()
{
    $this->Image('logo.png',95,5,20);
    // Select Arial bold 15
    $this->SetFont('Arial','I',16);
    // Move to the right
    $this->Cell(70);
    // Framed title
    $this->Cell(45,40,'Tehnicka skola GSP',0,0,'C');
    // Line break
    $this->Ln(35);
}
    
    function Footer()
{
        $this->SetY(-15);
    // Select Arial bold 15
    $this->SetFont('Arial','',10);
        
    // Move to the right
    $this->Cell(70);
    // Framed title
    $this->Cell(50,10,'strana '.$this->PageNo(),0,0,'C');
   
}
    
} 
                
$pdf = new PDF();
$pdf->AddPage();
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

// Load a UTF-8 string from a file and print it
//$txt = 'фњефњћфњечђшњечђдшљђњшдчљђџчђшđžćčšpokiljuggfsdr';
//$pdf->Write(8,$txt);

$pdf->MultiCell(0,6,$_POST['niz'],0,'L');

// Select a standard font (uses windows-1252)
$pdf->SetFont('Arial','',14);
$pdf->Ln(10);


$pdf->Output();
?>