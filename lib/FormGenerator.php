<?php
class FormGenerator {
	protected $listOfControls = array();
	public function setControl($control, $index) {
		$listOfControls[$index] = $control;
	}
}
?>