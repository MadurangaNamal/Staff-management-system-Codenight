<?php session_start();
if(!$_SESSION['id']){header('Location: ../login.php');}
    $logged=($_SESSION['id']);

?>
<?php
//including the database connection file
include_once("../oopbackend.php");

$crud = new Crud();

//getting id of the data from url
$id = $crud->escape_string($_GET['id']);
$stat="declined";
//deleting the row from table
$result = $crud->execute("UPDATE leave_trans 
							SET status ='$stat'
						WHERE leave_id=$id");


if ($result) {
	//redirecting to the display page (login.php in our case)
			
	header("Location: trans.php");
}
?>

