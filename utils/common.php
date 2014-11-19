<?php 

define('DS', DIRECTORY_SEPARATOR);

function debug($msg=""){
	if($msg==""){echo "";return;}
	//Echo the data according to the type	
	echo "<pre>";
	if(is_array($msg) || is_object($msg)){
		echo print_r($msg,true);
	}else{
		echo $msg;
	}
	echo "</pre>";
}
