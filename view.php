<?php

// We will find the payment total for 12 months
// And for this we are using for loop (12 Times)
for($j = 1; $j<=12; $j++)
{
	
	//In order to find the total payments for the months in the database query and for the sql query to work correctly
	//If the j value is single digit, we add 0 to the beginning.
	//(For example, if j is 1, we add 0 to the beginning of the j value and make the new value 01.)
	//Then we transfer this new value to the variable named m.
	if(strlen($j)<2)	 
		$m = "0".$j; 	
	else	 
		$m = $j; 
	
	//We name the sql variable that we transfer the query result to as sql1, sql2...sql12
	${'sql'.$j} = $db->prepare("SELECT  SUM(paid) AS totalDues  FROM  db_tablename  WHERE  date>='2020-$m-01'  AND  date<='2020-$m-31' ");

	${'sql'.$j}->execute();
	${'RA'.$j} = ${'sql'.$j}->fetch(PDO::FETCH_ASSOC);
	${'td'.$j} = ${'RA'.$j}["totalDues"];
}

?>
