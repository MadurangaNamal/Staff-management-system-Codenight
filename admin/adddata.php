<?php session_start();
$admin="admin";
if(!$_SESSION['id'] and $_SESSION['position'] != $admin){header('Location:../login.php');}
    $logged=($_SESSION['id']);

?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

	<?php include '../inc/styles.php'?>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../login.php">Staff Management system</a>
    </div>
    	 
      <a  href="dashboard.php">Home</a>
      <a  href="trans.php">View Transactions</a>
  </div>
</nav>
<head>
	<title>Add Data</title>
	<script type="text/javascript">
		function validate() {
			if (document.form1.name.value == '') {
				alert('Please provide your name');
				document.form1.name.focus();				
				return false;
			}
			if (document.form1.email.value == '') {
				alert('Please provide your email');
				document.form1.email.focus();
				return false;
			}
			return true;
		}
	</script>
	
	
</head>
<style type="text/css">
	#msg{
		width: 70%;


		}
</style>
<body>


	<div id="msg" class=''>
	<h3 >Adding New Employee</h3>
	<!--<form action="add.php" method="post" name="form1" onsubmit = "return(validate());">-->
	
	<form action="add.php" method="post" name="form1" id='contact' >
	
		<div class="container">
			<div class="form-group">
				<label for="name">Name:</label>
    			<input type="name" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
    			<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="pos">Division</label>
    			<SELECT name="division" id="division">
					<option >None</option>
					<option >All Divisions</option>
					<option >Establishments</option>
					<option >Examination</option>
					<option >General Administrations</option>
					<option >Student Affairs</option>
					<option >Maintenance</option>
					<option >Landscaping</option>
					<option >Medical center</option>
				</SELECT>
			</div>
			<div class="form-group">
				<label for="pos">Position</label>
    			<input type="pos" class="form-control" id="pos" name="pos" >
			</div>
			<div class="form-group">
				<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" >
			</div>
			
			
			
			<tr> 
				<td></td>
				<td><button class=" btn btn-success"id="contact-submit" type="submit" name="Submit">Submit</button></td>
			</tr>
		</div>
		
	</form>
	</div>
	</div>
</body>
</html>

<?php include '../footer.php'?>