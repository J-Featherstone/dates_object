<?php
class dates_object {
	
	//checks the input string to see if it has the date format yyyy-mm-dd
	//between the year 1000 and 9999
	public function check_date_format($date) {
		
		//regular expression: checks the string to see if it is within certain
		//parameters
		$regex = '/^([1-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/';
		
		//will check if the string is in this format, $matches is an array that
		//contains the contents of the round brackets in the $regex string.
		if (preg_match($regex, $date, $matches)) {
			
			switch ($matches[2]) {
				//check the months with 31 days in them
				case "01": 
				case "03": 
				case "05": 
				case "07": 
				case "08": 
				case "10": 
				case "12":
					if ($matches[3] > 31 || $matches[3] < 1) {
						return false;
					}
				break;
				//check the months with 30 days in them
				case "04": 
				case "06": 
				case "09": 
				case "11":
					if ($matches[3] > 30 || $matches[3] < 1) {
						return false;
					}
				break;
				//check february, check later for a leap year
				case "02":
					//check for a leap year and adjust days accordingly
					if (self::leap_year_check($matches[1])) {
						if ($matches[3] > 29 || $matches[3] < 1) {
							return false;
						}
					} else {
						if ($matches[3] > 28 || $matches[3] < 1) {
							return false;
						}
					}
					break;
				
				default:
					return false;
				}
			
		} else {
			return false;
		}
		//if the date passes all of these checks it is a valid date :)
		return true;
} 
	
	//checks if the input year is a leap year
	public function leap_year_check($year) {
		if ($year % 4 != 0) {
			return false;
		} elseif ($year % 100 == 0 && $year % 400 !== 0) {
				return false;
			} else {
				return true;
			}
	}
		
	
	
	//returns true and a string when dates are correctly formatted, returns false 
	//if incorrectly formatted
	public function date_later_than($d1, $d2) {
		
		$invalid = "invalid date format, please use: yyyy-mm-dd.";
		$later = "d1 is later than d2";
		$earlier = "d1 is earlier than d2";
		
		if ((self::check_date_format($d1) == false) || (self::check_date_format($d2) == false)) {
			echo $invalid;
			return false;
		}
		
		//convert the string into and array with each section of the dates as values.
		$regex = '/^([1-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/';
		preg_match($regex, $d1, $matches1);
		preg_match($regex, $d2, $matches2);
		
		//only check the next part of the date if the year or year and months are the same.
		if ($matches1[1] > $matches2[1]) {
			return $later;
		}
		
		elseif ($matches1[1] == $matches2[1]) {
			
			if ($matches1[2] > $matches2[2]) {
				return $later;
			}
			
			elseif ($matches1[2] == $matches2[2]) {
				
				if ($matches1[3] > $matches2[3]) {
					return $later;
				}
			}
		
		}
		return $earlier;
	}
//last bracket :)	
}
?>
