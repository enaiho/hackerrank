<?php



function findSchedules($workHours,$dayHours,$pattern){

	
	$output = array();
	$iterate = 0;
	$loopContinue = true;
	$slots_left = 0;
	$hours_worked = array();
	$pattern_length = strlen($pattern);
	$total_hrs_worked = 0;
	$hours_left = 0;
	$arr_iterate = array();
	$arr_pattern = str_split($pattern);
	$openDays = array_keys($arr_pattern, "?");

	if( $pattern_length > 0 ){

		
		for($i=0; $i<$pattern_length; $i++){


			if( $pattern[$i] == "?" )
				$slots_left++;
			else
				array_push($hours_worked, $pattern[$i]);

		}

		if( count($hours_worked) > 0 )
			$total_hrs_worked = array_sum($hours_worked);


		$hours_left =  $workHours - $total_hrs_worked;
		

	}


	// return $total_hrs_worked . "," .  $hours_left . "," . $slots_left;

	

	if ($hours_left <= 8) {
        $maxHours = $hours_left;
    }
    $permuts = numbersReachSum($hours_left, $slots_left, $dayHours);
    foreach ($permuts as $key => $permut) {
        $newPattern = array_replace(
            $arr_pattern,
            array_combine($openDays, explode(',', $permuts[$key]))
        );
        array_push($output, implode('', $newPattern));
    }

	
    return $output;

}



function permutations($values, $size)
{
    $a = array();
    $c = pow(count($values), $size);
    for ($i = 0; $i < $c; $i++) {
        $array = array();
        $count = count($values);
        for ($j = 0; $j < $size; $j++) {
            $selector = ($i / pow($count, $j)) % $count;
            $array[$j] = $values[$selector];
        }
        // $a[$i] = $array;
        yield $array;
    }
    
}
function numbersReachSum($target, $days, $maxHours)
{
    $results = [];
    foreach (permutations(range(0, $maxHours), $days) as $permutation) {
        if (array_sum($permutation) == $target) {
            array_push(
                $results,
                implode(',', $permutation)
            );
        }
    }
    return $results;
};


print_r(findSchedules( 24,4,"08??840" ));



//echo findSchedules( 56,8,"???8???" );


?>