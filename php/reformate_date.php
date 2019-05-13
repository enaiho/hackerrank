<?php

function day_converter($day){


	if( strlen($day) == 3 )
		$day = "0".$day[0];
	else if( strlen($day) == 4 )
		$day = $day[0].$day[1];

	return $day;

}

function month_converter($month){


	$month_val = "";
	$months = array( "Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec" );
	for($i=0; $i<count($months); $i++){


		if( strtolower(trim($month)) == strtolower($months[$i]) ){


			$month_val = (string) $i+1;
			if( strlen($month_val) == 1 )
				$month_val = "0".$month_val;

			break;

		}


	}

	return $month_val;

}


function reformatDate($dates){

	
	$new_dates = array();
	$new_date = "";
	$date = "";
	$arr_date = array();

	if( count($dates) > 0 ){

		for($i=0; $i<count($dates); $i++){

			
			$date = $dates[$i];
			$arr_date = explode(" ", $date);

			
			$day = day_converter($arr_date[0]);
			$month = month_converter($arr_date[1]);
			$year = $arr_date[2];

			$new_date = $year."-".$month."-".$day;
			array_push($new_dates, $new_date);


		}

	}

	return $new_dates;

}


reformatDate( array("20th Oct 2052","6th Jun 1933","26th May 1960") );



?>