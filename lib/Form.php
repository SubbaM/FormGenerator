<?php
class Form {	
	protected $formName = "form1";
	protected $formSubmitMethod = "GET";
	protected $formAction;
	protected $formHeader = "";
	protected $formFooter = "";
	
	public function createForm($formName = 'form1', $formAction = '', $formSubmitMethod = 'GET') {
		$this->formName = $formName;
		$this->formAction = $formAction;
		$this->formSubmitMethod = $formSubmitMethod;
	}
	public  function generateFormHeader() {
		$this->formHeader = "<form ";
		if(isset($this->formName) && $this->formName)
			$this->formHeader.="name='".$this->formName."' ";
		if(isset($this->formSubmitMethod) && $this->formSubmitMethod)
			$this->formHeader.="method='".$this->formSubmitMethod."' ";
		if(isset($this->formAction) && $this->formAction)
			$this->formHeader.="action='".$this->formAction."' ";
		$this->formHeader.=">";
		$this->formHeader.="\n";		
	}
	public  function generateFormFooter() {
		$this->formFooter = "</form>";
		$this->formFooter.= "\n";
	}
	public  function generateForm($listOfControls) {
		$this->generateFormHeader();
		$this->generateFormFooter();
		$formScript=$this->formHeader;
		foreach($listOfControls as $key => $control) {
			$formScript.=$control."\n";
		}
		$formScript.=$this->formFooter;
		return $formScript;
	}
}
?>