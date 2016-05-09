<?php
require_once("FormControl.php");
class SelectBox extends FormControl {
	protected static $allowedPropertyListChild = array('label','name','options','values');
	
	public function addProperty($property, $propertyValue) {
		$allowedPropertyList = self::getAllowedPropertyList();
		if($propertyValue)
			if(in_array($property, $allowedPropertyList))
				parent::setProperty($property, $propertyValue); 			
	}
	public function getProperties() {
		$propertiesArr = parent::getPropertiesArray();
		$properties = array();		
		$properties['options'] = explode(',',$propertiesArr['options']);
		$properties['values'] = explode(',',$propertiesArr['values']);
		$options="";
		foreach($properties['options'] as $key => $value) {
			$options.= "<option value='".$value."'>".$properties['values'][$key]."</option>\n";
		}
		unset($propertiesArr['options']);
		unset($propertiesArr['values']);
		$properties = array();
		$properties['fields'] = "";
		foreach($propertiesArr as $property => $propertyValue) {
			if($property != 'label')
				$properties['fields'].= "$property = '$propertyValue' ";
		}
		if(isset($this->properties['label'])) {
			$properties['label'] = $propertiesArr['label'];
		}
		$properties['options'] = $options;
		return $properties;
	}
	public function prepare() {
		$properties = $this->getProperties();
		parent::setField($properties['label']." <select ".$properties['fields']."/>\n".$properties['options']."</select><br>");
	}
	public static function getAllowedPropertyList() {
		return self::$allowedPropertyListChild;
	}
}
?>