<?php
require_once("FormControl.php");
class CheckBox extends FormControl {
	protected static $allowedPropertyListChild = array();

	public function prepare() {
		$properties = parent::getProperties();
		parent::setField(" <input type='checkbox' ".$properties['fields']."/>".$properties['label']."<br>");		
	}
	public static function getAllowedPropertyList() {
		return array_merge(parent::getAllowedPropertyList(),self::$allowedPropertyListChild);
	}
}
?>