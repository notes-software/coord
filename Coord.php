<?php

/**
 * This will check if the user is 
 * within the radius specified
 * 
 */
class Coord
{
	public function getDistance($gpsLat, $gpsLong, $userLat, $userLong, $userRadius)
	{
		$isInsideRadius = 0;
		$theta = $userLong - $gpsLong;
		$distance = sin(deg2rad($userLat)) * sin(deg2rad($gpsLat)) +  cos(deg2rad($userLat)) * cos(deg2rad($gpsLat)) * cos(deg2rad($theta));

		$distance = acos($distance);
		$distance = rad2deg($distance);
		
		// Miles = ($distance * 60 * 1.1515)
		// Kilometers = 1.609344
		$distanceInKm = $distance * 60 * 1.1515 * 1.609344;
		if($distanceInKm < $userRadius){
			// inside the defaultRadius
			$isInsideRadius = 1;
		}

		return $isInsideRadius;

	}


}
