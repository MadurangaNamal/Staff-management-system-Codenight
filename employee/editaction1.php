<?php session_start();
if(!$_SESSION['id']){header('Location: ../login.php');}
    $logged=($_SESSION['id']);

?>
<?php
// including the database connection file
include_once("../oopbackend.php");
include_once("../emailvalidation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update']))
{	
	$id = $crud->escape_string($_POST['id']);
	
	$name = $crud->escape_string($_POST['name']);
	$email = $crud->escape_string($_POST['email']);
	$pos = $crud->escape_string($_POST['pos']);
	$password = $crud->escape_string($_POST['password']);
	
	$msg = $validation->check_empty($_POST, array('name', 'email', 'pos','password'));
	$check_email = $validation->is_email_valid($_POST['email']);
	
	
	// checking empty fields
	if($msg) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}  else {	
		$result = $crud->execute("UPDATE users SET name='$name',position='$pos',email='$email',password='$password' where id=$id");
		header('location:dashoboard1.php');
	}
}
?>
