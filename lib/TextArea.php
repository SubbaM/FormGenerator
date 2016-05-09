<?php
require_once("FormControl.php");
class TextArea extends FormControl {
	protected static $allowedPropertyListChild = array('minlength','maxlength','rows','cols','placeholder');

	public function addProperty($property, $propertyValue) {
		$allowedPropertyList = self::getAllowedPropertyList();
		if($propertyValue)
			if(in_array($property, $allowedPropertyList))
				parent::setProperty($property, $propertyValue); 			
	}
	public function getProperties() {
		$propertiesArr = parent::getPropertiesArray();
		$properties = array();
		$properties['fields'] = "";
		foreach($propertiesArr as $property => $propertyValue) {
			if(($property != 'label') && ($property != 'value'))
				$properties['fields'].= "$property = '$propertyValue' ";
		}
		if(isset($this->properties['label'])) {
			$properties['label'] = $propertiesArr['label'];
		}
		if(isset($this->properties['value'])) {
			$properties['value'] = $propertiesArr['value'];
		}
		return $properties;
	}
	public function prepare() {
		$properties = $this->getProperties();
		parent::setField($properties['label']." <textarea ".$properties['fields'].">".$properties['value']."</ textarea><br>");
	}
	public static function getAllowedPropertyList() {
		return array_merge(parent::getAllowedPropertyList(),self::$allowedPropertyListChild);
	}
}
?>