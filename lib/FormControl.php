<?php
abstract class FormControl {
	protected $properties = array();
	protected static $allowedPropertyList = array('label','name','value');
	protected $field = "";
	
	public abstract function prepare();
	public function addProperty($property, $propertyValue) {
		$allowedPropertyList = self::getAllowedPropertyList();
		if($propertyValue)
			if(in_array($property, $allowedPropertyList))
				$this->properties[$property] = $propertyValue; 			
	}
	public function get() {
		$this->prepare();
		return $this->field;
	}
	public function setProperty($prop, $propVal) {
		$this->properties[$prop] = $propVal;
	}
	public function getPropertiesArray() {
		return $this->properties;
	}
	public function getProperties() {
		$properties = array();
		$properties['fields'] = "";
		foreach($this->properties as $property => $propertyValue) {
			if($property != 'label')
				$properties['fields'].= "$property = '$propertyValue' ";
		}
		if(isset($this->properties['label'])) {
			$properties['label'] = $this->properties['label'];
		}
		return $properties;
	}
	public function getLabel() {
		return $this->properties['label'];
	}
	public static function getAllowedPropertyList() {
		return self::$allowedPropertyList;
	}	
	public function setField($field) {
		$this->field = $field;
	}	
}
?>