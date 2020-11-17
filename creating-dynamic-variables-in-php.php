<?php

for($j = 1; $j<=12; $j++)
{
	if(strlen($j)<2){ $m = "0".$j; }else{ $m = $j; }
	${'sql'.$j} = $db->prepare("SELECT  SUM(paid) AS totalDues  FROM  $tblA  WHERE  date>='2020-$m-01'  AND  date<='2020-$m-31' ");

	${'sql'.$j}->execute();
	${'RA'.$j} = ${'sql'.$j}->fetch(PDO::FETCH_ASSOC);
	${'td'.$j} = ${'RA'.$j}["totalDues"];
	if(empty(${'td'.$j})){${'td'.$j}=0;}
	if($j!=12){ $total_due_sequence .= ${'td'.$j}.","; }else{ $total_due_sequence .= ${'td'.$j}; }
}

?>
