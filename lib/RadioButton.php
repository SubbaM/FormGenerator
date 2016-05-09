<?php
require_once("FormControl.php");
class RadioButton extends FormControl {
	protected static $allowedPropertyListChild = array();
	
	public function prepare() {
		$properties = parent::getProperties();
		// parent::setField($properties['label']." <input type='radio' ".$properties['fields']."/><br>");
		parent::setField(" <input type='radio' ".$properties['fields']."/>".$properties['label']."<br>");		
	}
	public static function getAllowedPropertyList() {
		return array_merge(parent::getAllowedPropertyList(),self::$allowedPropertyListChild);
	}
}
?>