<?php session_start();
$admin="admin";
if(!$_SESSION['id'] and $_SESSION['position'] != $admin){header('Location: ../login.php');}
    $logged=($_SESSION['id']);

?>
<?php
// including the database connection file
include_once("../oopbackend.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE id=$id");

foreach ($result as $res) {
	$name = $res['name'];
	$email = $res['email'];
	$pos = $res['position'];
	$password=$res['password'];
}
?>
<html>

<title>Edit</title>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>	
	<title>Edit Data</title>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Staff Management system</a>
    </div>
    	 
      <a  href="dashboard.php">Home</a>
      <a  href="trans.php">View pending Transactions</a>
      <a  href="viewapprove.php">View approve Transactions</a>

  </div>
</nav>
<h1>Edit Employee</h1>
<body>
	
	<form method="POST" action="editaction.php">
	<div class="container">
		
			<div class="form-group">
				<label for="name">Name:</label>
    			<input type="name" class="form-control" id="name" name="name" value="<?php echo $name ?>">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
    			<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
			</div>
			<div class="form-group">
				<label for="pos">Position</label>
    			<input type="pos" class="form-control" id="pos" name="pos" value="<?php echo $pos ?>" >
			</div>
			<input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" >
			<tr> 
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input class="btn btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</div>
	</form>
</body>
</html>
