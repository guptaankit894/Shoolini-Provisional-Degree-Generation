<?php
//error_reporting(0);
require "fpdf/fpdf.php";
require "dbscript.php";
$record=array();
$select_query="SELECT rollno from stud_prov;";
$q=mysqli_query($a,$select_query);
while($row = mysqli_fetch_row($q)){
	foreach($row as $values){
		array_push($record,$values);		
	}
}
//print_r($record);
//Check for Duplicate Entries
function checkEntry($str,$record){
	foreach($record as $key=> $values1){
		
		if($str==$values1){
			
			return 1;
			break;
			
		}
		else{
			continue;
			
			
		}
		
	}
	
}

//Check for null entry
function nullEntry($line){
	if($line[9]==null){
		return 1;
		//continue;
	}

}

class pdf extends FPDF{
	
	
	
	/* Main Code */
			function addDegree($line){
			
			$this->Cell(40,30,"Registration No:-".$line[0],13);
			$this->Ln();
			
			
		    //Logo and Provisional Degree Text		
			$image1="../download.jpg";
			$this->Cell(40, 30, $this->Image($image1, $this->GetX()+120,$this->GetY()+10), 0, 0, 'C');			
			
			$this->SetXY(130,80);		
						
			$this->setFont('Times','BIU','18');
			$this->Cell(40,10,"Provisional Degree",0,0,'C');
			
			
			
			
			$this->SetXY(0,100);						
			$this->setFont('Times','BIU','18');
			$this->Cell(300,10,$line[4],0,0,'C');
			
			
			//Main Body
			
			
			
			$this->SetXY(15,120);
			$this->setFont('Times','I','15');
			
			//$this->WriteHTML('<i>Certified that Mr./Ms.</i> <b><i><u> '.$line[1].'</i></u></b> <i>son/daughter of Shri</i> <b><i><u>'.$line[2].' </i></u></b> <i>has completed the prescribed course in the shoolini University of Biotechnolgy and Management Sciences in</i> <b><i><u>'.$line[3].'</i></u></b> <i>and has obtained the degree of</i> <b><i><u>'.$line[4].'</i></u></b> <i>in</i> <b><i><u>'.line[5].'</i></u></b> <i>at this University having passed the examination for the said degree held in</i> <b><i><u>'.$line[6].'</u></i></b> <i>with OGPA-</i> <b><i><u>'.$line[7]. '</u></i></b><hr>.',0);
			$this->MultiCell(0,10,"Certified that Mr./Ms. $line[1] Son/Daughter of Shri $line[2] has completed the prescribed course in the Shoolini University of Biotechnology and Management Sciences in $line[3] and has obtained the degree of $line[4]$line[5] in $line[6] at this University having passed the examination for the said degree held in $line[7] with OGPA- $line[8]." ,0,'J',false );
					
			//Date
			
			$this->SetXY(15,175);
			$this->Cell(100,10,"Dated:- ".$line[9],0,0,'L');
			$this->Cell(70);
			$this->Cell(100,10,"Controller of Examination",0,0,'R');
			
			
			}
}
$file=fopen($_FILES['file']['name'],"r");
$count=0;
$outp=array();
$dir_name=date('d-m-Y').'_'.rand(2,9999);
chdir('certificates/');
mkdir($dir_name);
while(($line=fgetcsv($file))!=False){
	$count++;
	if($count==1){
		continue;
	}
	elseif ($c = (nullEntry($line))==1){
	 continue;
	}
	elseif($rt= (checkEntry($line[0],$record))==1){
		continue;
	}
	else{
		
							
			$pdf = new PDF();
			$pdf->AddPage('L');
			$pdf->setFont('Times','B','15');
			$pdf->addDegree($line);
			$pdf->Output($dir_name.'/'.$line[0].'.pdf','F');
			$sql_query = "INSERT INTO stud_prov VALUES('$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]','$line[9]')";
			$r= mysqli_query($a,$sql_query);
			
		}
		
}
	
echo "<center><h3> The Provisional degrees have been generated.</h3></center>";
				

fclose($file);

?>