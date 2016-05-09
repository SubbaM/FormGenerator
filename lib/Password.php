<?php
require_once("FormControl.php");
class Password extends FormControl {
	protected static $allowedPropertyListChild = array('maxlength','size');
	
	public function addProperty($property, $propertyValue) {
		$allowedPropertyList = self::getAllowedPropertyList();
		if($propertyValue)
			if(in_array($property, $allowedPropertyList))
				parent::setProperty($property, $propertyValue); 			
	}
	public function prepare() {
		$properties = parent::getProperties();
		parent::setField($properties['label']." <input type='password' ".$properties['fields']."/><br>");
	}
	public static function getAllowedPropertyList() {
		return array_merge(parent::getAllowedPropertyList(),self::$allowedPropertyListChild);
	}
}
?>