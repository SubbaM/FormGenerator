<?php
error_reporting(0);
?>
<html>
<head>
	<title>HTML Form Generator</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<center>
		<h1>HTML Form Generator</h1>
		<form method="POST" action="getdata.php">
		<table>
		<tr>
			<th>Text Box</th>
			<th>Number Box</th>
			<th>Password</th>
			<th>Radio Button</th>
			<th>Check Box</th>
		</tr>
		<tr>
			<td>
				<input type="number" value=0 name='txtBoxCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='numBoxCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='pwdBoxCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='radioBtnCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='chkBoxCnt' min=0 max=20/>
			</td>
		</tr>
		<tr>
			<th>Select Box</th>
			<th>Hidden Box</th>
			<th>Text Area</th>
			<th>Button</th>
			<th>Submit Button</th>
		</tr>
		</tr>
			<td>
				<input type="number" value=0 name='selBoxCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='hdnBoxCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='txtAreaCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='btnCnt' min=0 max=20/>
			</td>
			<td>
				<input type="number" value=0 name='sbtBtnCnt' min=0 max=20/>
			</td>
		</tr>		
		</table>
		<br>
		<input type="submit" name="generateControls" value="Generate Controls"/>
		</form>
	</center>
</body>
</html>