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

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$stat="deleted";
$result = $crud->execute("UPDATE users 
							SET empstatus='$stat' 
							WHERE id=$id ");

if ($result) {
	//redirecting to the display page (login.php in our case)
	echo '<script language="javascript">';
			echo 'alert("Successfully deleted")';
			echo '</script>';
	header('location: dashboard.php');
}
?>

