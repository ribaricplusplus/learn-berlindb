<?php

namespace Lbdb;

class Book extends \BerlinDB\Database\Row {

	/**
	 * Retrieves the HTML to display the information about this book.
	 *
	 * @since 1.0.0
	 *
	 * @return string HTML output to display this record's data.
	 */
	public function display() {
		$result = "<h3>" . $this->title . "</h3>";
		$result .= "<dl>";
		$result .= "<dt>Author: </dt><dd>" . $this->author . "</dd>";
		$result .= "<dt>ISBN: </dt><dd>" . $this->isbn . "</dd>";
		$result .= "<dt>Published: </dt><dd>" . \wp_date( 'M d, Y', $this->date_published ) . "</dd>";
		$result .= "</dl>";
		return $result;
	}}
