<?php
require_once("FormControl.php");
class Button extends FormControl {
	protected static $allowedPropertyListChild = array('name','value');
	
	public function addProperty($property, $propertyValue) {
		$allowedPropertyList = self::getAllowedPropertyList();
		if($propertyValue)
			if(in_array($property, $allowedPropertyList))
				$this->properties[$property] = $propertyValue; 			
	}
	public function prepare() {
		$properties = parent::getProperties();
		parent::setField("<input type='button' ".$properties['fields']."/><br>");		
	}
	public static function getAllowedPropertyList() {
		return self::$allowedPropertyListChild;
	}
}
?>