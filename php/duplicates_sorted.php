<?php

function removeDuplicate($arr){

	$index = 0;
	$pointer = 0;


	foreach ($arr as $key => $value) {
		
		
		if( $pointer !=  $value){

			$arr[$index] = $value;
			$index++;

		}

		$pointer = $value;
		
	}

	return count(array_slice($arr, 0, $index));

}

print_r(removeDuplicate([1, 1, 1, 3, 5, 5, 7]));


?>