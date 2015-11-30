<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<style type="text/css">
	body {margin-top: 20px;}
	.form-group.required .control-label:after {content:" *"; color:red;}
	</style>

</head>
<body>

<div class="container">

<?php

include("../header.inc.php");

$form = new BoostrapForm('form');

// @todo radio, checkbox, checkbox one ex remember me, button, select, select-multiple
$form->radio('Gender', '', true, array('Mr', 'Miss'), 'Miss');


$form->text('UserName', 'Username', true, 'col-xs-12 col-sm-8 col-md-5', 'user');
$form->email('Email', '', true);
$form->password('Password', '', true);
$form->password('Password2', 'Confirm password', true);
$form->color('Color', 'Favorite color');
$form->file('Pdf', 'Your pdf', true);

$form->fieldsetStart('Info', "Information");
$form->tel('Phone', '', true)->help("Please enter a phone value")->pattern('[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}', "Phone number must be xx.xx.xx.xx");
$form->tel('Fax', '', true, 'phone-alt');
$form->tel('Mobile', '', true, 'phone');
$form->number('Age', '', true)->help("Please enter your age for example");
$form->fieldsetEnd();

$form->textarea('Comment', '', true);


// form bottom
$form->groupStart()->wrapperStart('col-xs-12 text-right');
$form->submit('Submit');
$form->wrapperEnd()->groupEnd();


echo $form->render();


?>
</div>


</body>
</html>




