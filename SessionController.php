<?php

session_start();
function setSesh($i,$p,$r){

	$_SESSION["id"] =$i;
	$_SESSION["password"] =$p;
	$_SESSION['position']=$r;
}
function unsetSesh(){

	session_unset();
	session_destroy(); 
}

?>