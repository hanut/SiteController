<?php 

define('DS', DIRECTORY_SEPARATOR);

function debug($msg){
	if(is_array($msg)){
		echo "<pre>".print_r($msg,true)."</pre>";
	}else{
		echo $msg;
	}
}
