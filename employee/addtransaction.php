
<html>
<head>
	<title>Add Transaction</title>
</head>

<body>

<?php
include_once("../oopbackend.php");
include_once("../emailvalidation.php");

$crud = new Crud();

$validation = new Validation();

if(isset($_POST['Submit'])) {	
	$id = $crud->escape_string($_POST['id']);
	$type = $crud->escape_string($_POST['type']);
	$days = $crud->escape_string($_POST['days']);
	$start = $crud->escape_string(date($_POST['date']));
		
	$msg = $validation->check_empty($_POST, array('id','type', 'days', 'start'));
	
	if($msg != null) {
		echo $msg;		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	 
		$result = $crud->execute("INSERT INTO leave_trans (leave_type,leave_days,leave_start,emp_id,status) VALUES('$type','$days','$start',$id,'pending')");
		

		echo "<font color='green'>transcation added successfully.";
		
	}
}
header("Location: trans1.php");
?>
</body>
</html>
