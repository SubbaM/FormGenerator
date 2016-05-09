<html>
<head>
	<title>HTML Form Generator</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<center>
<?php
error_reporting(0);
require_once("lib/InputText.php");
require_once("lib/InputNumber.php");
require_once("lib/Password.php");
require_once("lib/RadioButton.php");
require_once("lib/CheckBox.php");
require_once("lib/SelectBox.php");
require_once("lib/HiddenBox.php");
require_once("lib/TextArea.php");
require_once("lib/Button.php");
require_once("lib/SubmitButton.php");
require_once("lib/Form.php");

if(isset($_POST) && isset($_POST['generateFormScript'])) {
	$noOfTxtBox = $_POST['noOfTxtBox'];
	$noOfNumBox = $_POST['noOfNumBox'];
	$noOfPwdBox = $_POST['noOfPwdBox'];
	$noOfRadio = $_POST['noOfRadio'];
	$noOfChkBox = $_POST['noOfChkBox'];
	$noOfSelBox = $_POST['noOfSelBox'];
	$noOfHdnBox = $_POST['noOfHdnBox'];
	$noOfTxtArea = $_POST['noOfTxtArea'];
	$noOfBtn = $_POST['noOfBtn'];
	$noOfSubBtn = $_POST['noOfSubBtn'];
	$formName = $_POST['formName'];
	$formSubmitMethod = $_POST['formSubmitMethod'];
	$formActionPage = $_POST['formActionPage'];
	$formObj = array();
	$allowedProperties = InputText::getAllowedPropertyList();
	for($i = 1; $i <= $noOfTxtBox; $i++ ) {
		$txtBoxObj = new InputText();
		foreach($allowedProperties as $property) {
			$txtBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $txtBoxObj->get(); 
	}
	
	$allowedProperties = InputNumber::getAllowedPropertyList();
	for($i = ($noOfTxtBox + 1); $i <= ($noOfNumBox + $noOfTxtBox); $i++) {
		$numBoxObj = new InputNumber();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = Password::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox); $i++) {
		$numBoxObj = new Password();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = RadioButton::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio); $i++) {
		$numBoxObj = new RadioButton();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = CheckBox::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox); $i++) {
		$numBoxObj = new CheckBox();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = SelectBox::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox); $i++) {
		$numBoxObj = new SelectBox();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = HiddenBox::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox); $i++) {
		$numBoxObj = new HiddenBox();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = TextArea::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea); $i++) {
		$numBoxObj = new TextArea();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = Button::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn); $i++) {
		$numBoxObj = new Button();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	$allowedProperties = SubmitButton::getAllowedPropertyList();
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn + $noOfSubBtn); $i++) {
		$numBoxObj = new SubmitButton();
		foreach($allowedProperties as $property) {
			$numBoxObj->addProperty($property, $_POST["$property$i"]);
		}
		$formObj[intval($_POST["seqNo$i"])] = $numBoxObj->get(); 
	}
	
	ksort($formObj);
	$form = new Form();
	$form->createForm($formName, $formActionPage, $formSubmitMethod);
	$formScript = $form->generateForm($formObj);
?>
	<h3><i>HTML Code for the Form goes here..</i></h3>
		<textarea name="generatedCode" rows=25 cols=100>
<?php
	echo $formScript;
?>
		</textarea>		
		<form action="index.php">
			<br><input type="submit" value="Start Again!" />
		</form>
	</center>
	</body>
</html>
<?php
}
?>
