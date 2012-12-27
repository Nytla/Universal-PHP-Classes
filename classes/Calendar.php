<?php
/**
 * Calendar.php
 *
 * This is file with Calendar class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Calendar
 * 
 * This is Calendar class
 * 
 * @version 0.1
 */
final class Calendar {

	/**
	 * calendarPrint
	 * 
	 * This function print calendar as an array
	 *
	 * @param integer $month
	 * @param integer $year
	 * 
	 * @return array  $return
	 */
	static public function calendarPrint($month = 0, $year = 0) {

		/**
		 * Get the current or provided month and year
		 */
		$month = ($month == 0) ? date('m', $date) : $month;

		$year = ($year == 0) ? date('Y', $date) : $year;

		/**
		 * Find the first day of the month
		 */
		$first_day = mktime(0, 0, 0, $month, 1, $year);

		/**
		 * Month title
		 */
		$title=date('F',$first_day);

		/**
		 * Day of the week of the first day of the month
		 */
		$day_of_week = date('D', $first_day);

		/**
		 * Get number of blanks
		 */
		switch($day_of_week) {
			case "Sun": 
				$blank = 0; 
				break;
			
			case "Mon": 
				$blank = 1; 
				break;
			
			case "Tue": 
				$blank = 2; 
				break;
		
			case "Wed": 
				$blank = 3; 
				break;
		
			case "Thu": 
				$blank = 4; 
				break;
		
			case "Fri": 
				$blank = 5; 
				break;
		
			case "Sat": 
				$blank = 6; 
				break;
		}

		/**
		 * Get the total days in the month
		 */
		$days_in_month = date('t', strtotime($year . '-' . $month . '-01'));

		/**
		 * Set day of week count and week count
		 */
		$day_count = 1;
		
		$week_count = 0;

		/**
		 * Fill in the blanks
		 */
		while($blank > 0) {
			
			$return[$week_count][] = '';

			$blank = $blank-1;
		
			$day_count++;
		}

		/**
		 * Set first day of the month to 1
		 */
		$day_num = 1;

		/**
		 * Loop through the days, adding a new row every 7 days
		 */
		while($day_num <= $days_in_month) {

			$return[$week_count][]=$day_num;
		
			$day_num++;
		
			$day_count++;

			/**
			 * Add new row and reset day of week on 8th day
			 */
			if($day_count > 7) {
				$week_count++;
				$day_count = 1;
			}
		}

		/**
		 * If it's the end of the month and there's still
		 */
		while($day_count>1 && $day_count <=7){

			/**
			 * Days left in the week, fill them in with blanks
			 */
			$return[$week_count][] = '';

			$day_count++;
		}

		return $return;
	}
}
?>