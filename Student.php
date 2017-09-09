<?php

/**
 * A class that represents a Student
 */
class Student {

	/**
	 * Default constructor
	 */
	function __construct() {
		$this->surname = '';
		$this->first_name = '';
		$this->emails = array();
		$this->grades = array();
	}

	/**
	 * Adds an email to the student
	 * @param which
	 *			- whether the email is for home, work, etc.
	 * @param address
	 *			- the email address to store
	 */
	function add_email($which,$address) {
		$this->emails[$which] = $address;
	}

	/**
	 * Adds grade to the student
	 * @param grade
	 *			- grade to be added
	 */
	function add_grade($grade) {
		$this->grades[] = $grade;
	}

	/**
	 * Method that computes and returns the average of the Student
	 * @return average
	 */
	function average() {
		$total = 0;
		foreach ($this->grades as $value)
			$total += $value;
		return $total / count($this->grades);
	}

	/**
	 *	Returns the formatted Student info
	 */
	function toString() {
		$result = $this->first_name . ' ' . $this->surname;
		$average_formatted = $this->average();

		if(is_double($this->average()))
		{
			$average_formatted = number_format($this->average(), 2, '.', '');
		}

		$result .= ' ('. $average_formatted .")\n";
		foreach($this->emails as $which=>$what)
			$result .= $which . ': '. $what. "\n";
		$result .= "\n";
		return '<pre>'.$result.'</pre>';
	}
}
