<?php
$myfile = fopen("mp_data.txt", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("mp_data.txt"));
$writeFile = fopen("newfile.txt", "w") or die("Unable to open file!");
$names = explode("\n",$data);
$string="";
$nameCount = count($names);
for ($i=0; $i <$nameCount ; $i++) { 
	$names[$i] = explode(" ", $names[$i]);
	for ($j=0; $j < count($names[$i]); $j++) { 
		if($j==0){
			$string=$string."firstname:"." ".$names[$i][$j]."\n";
			

		}
		else if($j==count($names[$i])-1){
			$string=$string."lastname:"." ".$names[$i][$j]."\n";
			
		}
		else{
			$string=$string."middlename:"." ".$names[$i][$j]."\n";
			
		}
	}
	$string = $string."\n";
}
$result = preg_replace('/[\x00-\x09\x0B-\x1F\x80-\xFF]/', '', $string);
fwrite($writeFile, $result);
fclose($myfile);
fclose($writeFile);

?>
