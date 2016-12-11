<?php
$raw = get_defined_functions();
$defined_functions_array = $raw["internal"];
$suggested_functions = array();

function filter_name($function_name) {
	return str_replace("_", "-", $function_name);
}

if (isset($_GET['code'])) {
	$code = $_GET['code'];
}

// get the list of suggested functions from code content
foreach ($defined_functions_array as $key => $function_name) {
	if (strpos($code, $function_name)!==FALSE) {
		$code = str_replace($function_name, "", $code);
		$suggested_functions[] = $function_name;
	}
}

// display the list of suggestions as links to the php manual
echo "<ol>";
foreach ($suggested_functions as $key => $suggestion) {
	echo "<li><a target='_blank' href='http://php.net/manual/en/function." . filter_name($suggestion) . ".php'>" . $suggestion . "</a></li>";
}
echo "</ol>";
?>