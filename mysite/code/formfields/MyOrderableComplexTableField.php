<?php
/**
 * An extension to {@link ComplexTableField} to support drag and drop ordering.
 *
 * @package silverstripe-orderable
 */
class MyOrderableComplexTableField extends OrderableComplexTableField {

	/**
	* Set Source ID
	*
	* sets the source ID for the ComplexTableField
	*
	* @param int $val The ID of the source object
	*/
	function setSourceID($val) {
		if (is_numeric($val)) {
			$this->sourceID = $val;
		}
	}
	 
	/**
	 * Source ID
	 *
	 * returns the sourceID as previously set or passed as a form field
	 *
	 * @return int the ID of the source object
	 */
	function sourceID() {
		if (isset($this->sourceID) && $this->sourceID !== null && is_numeric($this->sourceID)) {
			return $this->sourceID;
		}
		return parent::sourceID();
	}

}