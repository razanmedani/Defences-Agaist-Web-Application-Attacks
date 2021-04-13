<?php
//presence
$errors=array();
function fieldname_as_text($fieldname){
	$fieldname=str_replace("_"," ",$fieldname);
	$fieldname=ucfirst($fieldname);
	return $fieldname;
}
function has_presence($value){
	return isset($value) && $value!=="";
}
function validate_presence($required_fields){
	global $errors;
	foreach($required_fields as $fiel){
		$value=trim($_POST[$fiel]);
		if(!has_presence($value)){
			$errors[$fiel]=fieldname_as_text($fiel) . "  cannot be blank";
		}
	}
}

//string length
function has_max_length($value,$max){
	return strlen($value)<= $max ;
}
function validate_max_length($fields_max_length){
	global $errors;
	foreach($fields_max_length as $fields => $max){
		$value=trim($_POST[$fields]);
		if(!has_max_length($value,$max)){
			$errors[$fields]=fieldname_as_text($fields) . "cannot be blank";
		}
	}
}
//inclusion in a set
function has_inclusion($value,$set){
	return in_array($value,$set);
}


 ?>
