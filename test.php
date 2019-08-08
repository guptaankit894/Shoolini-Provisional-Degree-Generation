<?php
$file=fopen($_FILES['file']['name'],"r");


function nullEntry($line){
	if(in_array(null,$line)){
		return 1;
		continue;
	}

}
while(($line=fgetcsv($file))!=False){
	
	if ($c = (nullEntry($line))==1){
	 continue;
	}
	
	else{
		echo "no null value";
		echo "<br />";
	}
	
	
	
	
}
?>