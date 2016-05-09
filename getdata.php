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
?>
<html>
<head>
	<title>HTML Form Generator</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<center>
<?php
if(isset($_POST) && isset($_POST['generateControls'])) {
	$noOfTxtBox = $_POST['txtBoxCnt'];
	$noOfNumBox = $_POST['numBoxCnt'];
	$noOfPwdBox = $_POST['pwdBoxCnt'];
	$noOfRadio = $_POST['radioBtnCnt'];
	$noOfChkBox = $_POST['chkBoxCnt'];
	$noOfSelBox = $_POST['selBoxCnt'];
	$noOfHdnBox = $_POST['hdnBoxCnt'];
	$noOfTxtArea = $_POST['txtAreaCnt'];
	$noOfBtn = $_POST['btnCnt'];
	$noOfSubBtn = $_POST['sbtBtnCnt'];
	$totalControls = $noOfTxtBox + $noOfNumBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfBtn + $noOfSubBtn + $noOfHdnBox + $noOfTxtArea;
	echo "
		<h1>HTML Form Generator</h1>
		<table style='border: 1px solid ! important;border-collapse: collapse'>
		<tr>
			<th style='border: 1px solid ! important;width: 150px;'>Text Box</th>
			<td style='border: 1px solid ! important;width: 50px;'>".$noOfTxtBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Number Box</th>
			<td style='border: 1px solid ! important;'>".$noOfNumBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Password</th>
			<td style='border: 1px solid ! important;'>".$noOfPwdBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Radio Button</th>
			<td style='border: 1px solid ! important;'>".$noOfRadio."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Check Box</th>
			<td style='border: 1px solid ! important;'>".$noOfChkBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Select Box</th>
			<td style='border: 1px solid ! important;'>".$noOfSelBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Hidden Box</th>
			<td style='border: 1px solid ! important;'>".$noOfHdnBox."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Text Area</th>
			<td style='border: 1px solid ! important;'>".$noOfTxtArea."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Button</th>
			<td style='border: 1px solid ! important;'>".$noOfBtn."</td>
		</tr>
		<tr>
			<th style='border: 1px solid ! important;'>Submit Button</th>
			<td style='border: 1px solid ! important;'>".$noOfSubBtn."</td>
		</tr>
		</table>
		<br>";
	echo "
	<form method='POST' action='processcontrol.php'>	
	<input type='hidden' name='noOfTxtBox' value='$noOfTxtBox' />
	<input type='hidden' name='noOfNumBox' value='$noOfNumBox' />
	<input type='hidden' name='noOfPwdBox' value='$noOfPwdBox' />
	<input type='hidden' name='noOfRadio' value='$noOfRadio' />
	<input type='hidden' name='noOfChkBox' value='$noOfChkBox' />
	<input type='hidden' name='noOfSelBox' value='$noOfSelBox' />
	<input type='hidden' name='noOfHdnBox' value='$noOfHdnBox' />
	<input type='hidden' name='noOfTxtArea' value='$noOfTxtArea' />
	<input type='hidden' name='noOfBtn' value='$noOfBtn' />
	<input type='hidden' name='noOfSubBtn' value='$noOfSubBtn' />";
	
	if($totalControls > 0) {
		echo "
			<table>
			<tr>
				<th style='width: 250;'>Form Name</td>
				<td><input type='text' name='formName'></td>
			</tr>
			<tr>
				<th>Form Submission Method</td>
				<td><input type='text' name='formSubmitMethod'></td>
			</tr>
			<tr>
				<th>Form Action Page</td>
				<td><input type='text' name='formActionPage'></td>
			</tr>
			</table>
		";
	}
	
	$textProperties = InputText::getAllowedPropertyList();
	if($noOfTxtBox > 0) {
		echo "<h2>Text Box</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}
	for($i = 1; $i <= $noOfTxtBox; $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = InputNumber::getAllowedPropertyList();
	if($noOfNumBox > 0) {
		echo "<h2>Number Box</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfTxtBox + 1); $i <= ($noOfNumBox + $noOfTxtBox); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";	
	$textProperties = Password::getAllowedPropertyList();
	if($noOfPwdBox > 0) {
		echo "<h2>Password</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";	
	$textProperties = RadioButton::getAllowedPropertyList();
	if($noOfRadio > 0) {
		echo "<h2>Radio Button</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = CheckBox::getAllowedPropertyList();
	if($noOfChkBox > 0) {
		echo "<h2>Check Box</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = SelectBox::getAllowedPropertyList();
	if($noOfSelBox > 0) {
		echo "<h2>Select Box</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.</th>";
		foreach($textProperties as $property) {
			if($property == 'options' || $property == 'values') 
				echo "<th>".strtoupper($property)."<br>(Please enter comma <br>separated values)"."</th>";
			else
				echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = HiddenBox::getAllowedPropertyList();
	if($noOfHdnBox > 0) {
		echo "<h2>Hidden Box</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = TextArea::getAllowedPropertyList();
	if($noOfTxtArea > 0) {
		echo "<h2>Text Area</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = Button::getAllowedPropertyList();
	if($noOfBtn > 0) {
		echo "<h2>Button</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$textProperties = SubmitButton::getAllowedPropertyList();
	if($noOfSubBtn > 0) {
		echo "<h2>Submit Button</h2><table>";
		echo "<tr>";
		echo "<th>SEQUENCE NO.";
		foreach($textProperties as $property) {
			echo "<th>".strtoupper($property)."</th>";
		}
		echo "</tr>";
	}	
	for($i = ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn + 1); $i <= ($noOfNumBox + $noOfTxtBox + $noOfPwdBox + $noOfRadio + $noOfChkBox + $noOfSelBox + $noOfHdnBox + $noOfTxtArea + $noOfBtn + $noOfSubBtn); $i++) {
		echo "<tr>";
		echo "<td>";
		echo "<select name=seqNo$i>";
		for($j=1;$j<=$totalControls;$j++) {
			echo "<option value=$j>$j</option>";
		}
		echo "</select>";
		echo "</td>";
		foreach($textProperties as $property) {
			echo "<td><input type='text' name='$property$i' /></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "<br>";
	if($totalControls == 0) {
		echo "</form>
		<form action='index.php'>
			<br><input type='submit' value='Start Again!' />
		</form>";
	}
	else {
		echo "<input type='submit' name='generateFormScript' value='Generate Form Script' />";
		echo "</form>";
	}
	
} 
?>